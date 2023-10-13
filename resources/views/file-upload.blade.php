<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>Laravel File Upload</title>
    <style>
        .container {
            max-width: 500px;
        }
        dl, ol, ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }
        * {
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}



body {
    font-family: -apple-system, BlinkMacSystemFont, Roboto, Segoe UI,
        Helvetica Neue, Helvetica, Arial, sans-serif;
    margin: 0 auto;
    -webkit-font-smoothing: antialiased;
    box-sizing: border-box;
    color: #2f2f2f;
    line-height: 1.5;
}

.ath_container {
    width: 740px;
    margin: 20px auto;
    padding: 0px 20px 0px 20px;
}

.ath_container {
    width: 820px;
    border: #d7d7d7 1px solid;
    border-radius: 5px;
    padding: 10px 20px 10px 20px;
    box-shadow: 0 0 5px rgba(0, 0, 0, .3);
    /* border-radius: 5px; */
}

#uploadStatus {
    color: #00e200;
}

.ath_container a {
    text-decoration: none;
    color: #2f20d1;
}

.ath_container a:hover {
    text-decoration: underline;
}

.ath_container img {
    height: auto;
    max-width: 100%;
    vertical-align: middle;
}


.ath_container .label {
    color: #565656;
    margin-bottom: 2px;
}



.ath_container .message {
    padding: 6px 20px;
    font-size: 1em;
    color: rgb(40, 40, 40);
    box-sizing: border-box;
    margin: 0px;
    border-radius: 3px;
    width: 100%;
    overflow: auto;
}

.ath_container .error {
    padding: 6px 20px;
    border-radius: 3px;
    background-color: #ffe7e7;
    border: 1px solid #e46b66;
    color: #dc0d24;
}

.ath_container .success {
    background-color: #48e0a4;
    border: #40cc94 1px solid;
    border-radius: 3px;
    color: #105b3d;
}

.ath_container .validation-message {
    color: #e20900;
}

.ath_container .font-bold {
    font-weight: bold;
}

.ath_container .display-none {
    display: none;
}

.ath_container .inline-block {
    display: inline-block;
}

.ath_container .float-right {
    float: right;
}

.ath_container .float-left {
    float: left;
}

.ath_container .text-center {
    text-align: center;
}

.ath_container .text-left {
    text-align: left;
}

.ath_container .text-right {
    text-align: right;
}

.ath_container .full-width {
    width: 100%;
}

.ath_container .cursor-pointer {
    cursor: pointer;
}

.ath_container .mr-20 {
    margin-right: 20px;
}

.ath_container .m-20 {
    margin: 20px;
}



.ath_container table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
    margin-top: 20px;
}


.ath_container table th,
.ath_container table td {
    text-align: left;
    padding: 5px;
    border: 1px solid #ededed;
    width: 50%;
}

tr:nth-child(even) {
    background-color: #f2f2f2
}

.ath_container .progress {
    margin: 20px 0 0 0;
    width: 300px;
    border: 1px solid #ddd;
    padding: 5px;
    border-radius: 5px;
}

.ath_container .progress-bar {
    width: 0%;
    height: 24px;
    background-color: #4CAF50;
    margin-top: 15px;
    border-radius: 12px;
    text-align: center;
    color: #fff;
}

@media all and (max-width: 780px) {
    .ath_container {
        width: auto;
    }
}


.ath_container input,
.ath_container textarea,
.ath_container select {
    box-sizing: border-box;
    width: 200px;
    height: initial;
    padding: 8px 5px;
    border: 1px solid #9a9a9a;
    border-radius: 4px;
}

.ath_container input[type="checkbox"] {
    width: auto;
    vertical-align: text-bottom;
}

.ath_container textarea {
    width: 300px;
}

.ath_container select {
    display: initial;
    height: 30px;
    padding: 2px 5px;
}

.ath_container button,
.ath_container input[type=submit],
.ath_container input[type=button] {
    padding: 8px 30px;
    font-size: 1em;
    cursor: pointer;
    border-radius: 25px;
    color: #ffffff;
    background-color: #6213d3;
    border-color: #9554f1 #9172bd #4907a9;
}

.ath_container input[type=submit]:hover {
    background-color: #f7c027;
}

::placeholder {
    color: #bdbfc4;
}

.ath_container label {
    display: block;
    color: #565656;
}

@media all and (max-width: 400px) {
    .ath_container {
        padding: 0px 20px;
    }

    .ath_container {
        width: auto;
    }

    .ath_container input,
    .ath_container textarea,
    .ath_container select {
        width: 100%;
    }
}
    </style>
</head>
<body>
    <div class="container mt-5">
        <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
          <h3 class="text-center mb-5">Upload File Process</h3>
            @csrf
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif
            <div class="custom-file">
                <input type="file" name="file" class="custom-file-input" id="chooseFile">
                <label class="custom-file-label" for="chooseFile">Select file</label>
            </div>
            <button onclick="uploadFiles()" class="btn btn-primary btn-block mt-4">
                Upload Files
            </button>
    </br>
    <div class="ath_container tile-container ">
            <table id="progressBarsContainer">
          <thead>
            <tr>
           
                <th style="text-align: center;">Time</th>
                <th style="text-align: center;">Name</th>
                <th style="text-align: center;">Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($files as $file)
              <tr>
                <!-- <td width="3%">{{ $file->id }}</td> -->
               <td> {{ date('M d, Y h:i A', strtotime($file->created_at)) }}</td>
                <td>{{ $file->name }}</td>
              <div> </div><br>
              </tr>
            @endforeach
           
          </tbody>
    </table>
    </div>
        </form>
    </div>
    <script>
        
        function uploadFile(file) {
            var formData = new FormData();
            formData.append('file', file);

            var progressBarContainer = document.createElement('div'); // Container for progress bar and file name
            progressBarContainer.className = 'progress-container';

            var fileName = document.createElement('div'); // Display file name
            fileName.className = 'file-name';
            fileName.textContent = file.name;
            //progressBarContainer.appendChild(fileName);

            var progressBar = document.createElement('div'); // Create a new progress bar element
            progressBar.className = 'progress-bar';
            progressBar.id = 'progressBar_' + file.name;

            progressBarContainer.appendChild(progressBar);

            var progressBarsContainer = document.getElementById('progressBarsContainer');

            var newRow = document.createElement('tr'); // Create a new table row
            var newCell = document.createElement('td'); // Create a new table cell
            var newCell2 = document.createElement('td'); // Create a new table cell
            newCell.appendChild(fileName);
            newCell2.appendChild(progressBarContainer);
            newRow.appendChild(newCell);
            newRow.appendChild(newCell2);
            progressBarsContainer.appendChild(newRow);

            var xhr = new XMLHttpRequest();

            xhr.upload.addEventListener('progress', function(event) {
                if (event.lengthComputable) {
                    var percent = Math.round((event.loaded / event.total) * 100);
                    progressBar.style.width = percent + '%';
                    progressBar.innerHTML = percent + '%';
                }
            });

            xhr.addEventListener('load', function(event) {
                var uploadStatus = document.getElementById('uploadStatus');
                uploadStatus.innerHTML = event.target.responseText;
                // Reset the input field of type "file"
                document.getElementById('fileUpload').value = '';

            });

            xhr.open('POST', 'upload.php', true);
            xhr.send(formData);
        }
    </script>
    
</body>
</html>