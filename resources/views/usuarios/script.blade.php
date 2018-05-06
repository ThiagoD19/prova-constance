@section('js')
    <script>
        $(document).ready(function() {
            $('input[name="telefone"]').mask('(00) 0000-0000', {placeholder:'(00) 0000-0000'});
            $('input[name="salario"]').mask('000.000,00', {reverse: true, placeholder:'R$'});
        });

        $(function() {
            $('input[name="dataNascimento"]').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1910,
                maxYear: 2018.5,
                locale: {
                    format: 'DD/MM/YYYY'
                }
            });
        });


        $("#foto").change(function() {
            loadImage(this);
        });

        function loadImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                canvas = null;
                reader.onload = function(e) {
                    image = new Image();
                    image.onload = validateImage;
                    image.src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function validateImage() {
            if (canvas != null) {
                image = new Image();
                image.src = canvas.toDataURL('image');
            } else restartJcrop();
        }

        function restartJcrop() {

            $("#upload-foto").empty().append("<canvas id=\"canvas\" class=\"profile-user-img img-responsive img-circle\">");
            canvas = $("#canvas")[0];
            context = canvas.getContext("2d");
            canvas.width = image.width;
            canvas.height = image.height;
            context.drawImage(image, 0, 0);
        }

    </script>
@stop