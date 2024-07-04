<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Signature CSS -->
    <link rel="stylesheet" href="http://keith-wood.name/css/jquery.signature.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        .kbw-signature {
            width: 100%;
            height: 200px;
        }
        #sigpad canvas{
            width: 100% !important;
            height:auto;
        }
    </style>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h3>Your Signature is required</h3>
                    </div>
                    <div class="card-body">
                        <div class="col-md-12">
                            <label for="">Draw Signature</label>
                            <br>
                            <form method="POST" action="upload.php">
                                <div id="sigpad"></div>
                                <br><br>
                                <button id="clear" class="btn btn-danger">
                                    Clear Signature
                                </button>
                                <textarea name="signature" id="signature" style="display:none"></textarea>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.14.0-beta.2/jquery-ui.min.js" integrity="sha256-E7PeZTkHU61hmvmEMwtUMgm9Aff574wswy5F1Y0oIRA=" crossorigin="anonymous"></script>

    <!-- Signature JavaScript -->
    <script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

    <script>
        var sigpad = $('#sigpad').signature({
            syncField: '#signature',
            syncFormat: 'PNG'
        });

        $('#clear').click(function (e){
            e.preventDefault();
            sigpad.signature('clear');
            $('#signature').val('');
        });
    </script>
</body>
</html>
