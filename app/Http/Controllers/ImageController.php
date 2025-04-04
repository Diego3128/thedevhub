<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        if ($request->hasFile("post_image")) {
            // image
            $postImage = $request->file("post_image");
            // validate type
            if (!in_array($postImage->getClientOriginalExtension(), ["png", "jpg", "jpeg"])) {
                return response()->json([
                    "success" => true,
                    "message" => "Invalid image type. Only JPG, JPEG, and PNG are allowed.",
                ]);
            }
            // unique image name
            $imageName =  Str::uuid() . "." . $postImage->getClientOriginalExtension();
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            // process image
            $serverImage = $manager->read($postImage->getPathname());
            $serverImage->cover(width: 400, height: 400);
            // save image
            Storage::disk("public")->put("uploads/$imageName", (string) $serverImage->encode());

            return response()->json([
                "success" => true,
                "message" => "Image saved",
                "path" => asset("storage/uploads/$imageName"),
                "name" => $imageName,
                "status" => 200
            ]);
        }

        return response()->json(["error" => "No image uploaded"], 400);
    }
}
