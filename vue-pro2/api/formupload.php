<?php
// $target_dir = "uploads/";
// $path_parts = pathinfo($_FILES["fileToUpload"]["name"]);
// $image_path = $path_parts['filename'] . '_' . time() . '.' . $path_parts['extension'];
// $target_file = $target_dir . basename($image_path);
// $uploadOk = 0;
// print_r($path_parts);
// if (($_FILES["fileToUpload"]["type"] == "image/jpg")
//     || ($_FILES["fileToUpload"]["type"] == "image/png")
//     || ($_FILES["fileToUpload"]["type"] == "image/jpeg")) {
//     echo "Considering file size <br>";
// } else {
//     echo "Only jpg & png are allowed <br>";
//     $uploadOk += 1;
// }




// $uploadId = array();
// if ($files = $request->file('file')) {
//     foreach ($request->file('file') as $key => $file) {
//         $name = time() . $key . $file->getClientOriginalName();
//         $filename = $file->move('files', $name);
//         $uploadId[] = Upload::create([
//             'file' => $name
//         ])->id;
//     }
// }
// return response()->json($uploadId, 200);


if ($request->hasFile('file')) {
    $path = $request->file('file')->store('images');
    return response()->json([
        'message' => 'Upload success.',
        'path' => $path,
        'status' => 200
    ], 200);
} else {
    return response()->json([
        'message' => 'Upload Fail.',
        'path' => $path,
        'status' => 206
    ], 206);
}