<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone Image Upload in Laravel</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Dropzone CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Dropzone Image Upload in Laravel</h1>

                <!-- Form Dropzone -->
                <form action="{{ route('dropzone.store') }}" method="POST" class="dropzone" id="image-upload" enctype="multipart/form-data">
                    @csrf
                    <div class="dz-message text-center">
                        <h3>Upload Multiple Images</h3>
                        <p>Drag & drop files here or click to select.</p>
                    </div>
                </form>

                <!-- Tombol Upload -->
                <div class="text-center mt-3">
                    <button type="button" id="submit-all" class="btn btn-primary">Upload</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        Dropzone.options.imageUpload = {
            autoProcessQueue: false, 
            maxFilesize: 10, 
            acceptedFiles: ".jpeg,.jpg,.png,.gif", 
            addRemoveLinks: true, 
            createImageThumbnails: true, 
            parallelUploads: 10, 
            init: function () {
                let myDropzone = this;

                // Aksi ketika tombol upload diklik
                document.getElementById("submit-all").addEventListener("click", function (e) {
                    e.preventDefault();
                    myDropzone.processQueue();
                });

                // Menambahkan input form ke dalam formData Dropzone saat mengirim
                myDropzone.on("sending", function (file, xhr, formData) {
                    let data = $("#image-upload").serializeArray();
                    data.forEach(item => formData.append(item.name, item.value));
                });

                // Callback sukses
                myDropzone.on("success", function (file, response) {
                    console.log("Upload sukses:", response);
                });

                // Callback error
                myDropzone.on("error", function (file, errorMessage) {
                    console.error("Error upload:", errorMessage);
                });
            }
        };
    </script>

</body>
</html>