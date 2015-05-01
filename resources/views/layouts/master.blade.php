<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>BillReminder - @yield('title')</title>
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        {!! HTML::style('css/laraBill.css') !!}
    </head>

    <body>
        @section('sidebar')
            @include('layouts.nav')
        @show

        <div class="container">

            {{-- Include das Mensagens Flash (eg. success, warning, error) --}}
            @include('layouts._flashMessages') 


            @yield('content')
        
         </div> <!-- /container -->

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Todos os direitos reservados by LFTM &copy; {{ date("Y") }}</p>
            </div>
        </footer>

        
     <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
     <!-- Latest compiled and minified JavaScript -->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
     {!! HTML::script('js/jQuery-Mask-Plugin-master/src/jquery.mask.js'); !!}
     {!! HTML::script('js/datepicker/js/bootstrap-datepicker.js'); !!}
     {!! HTML::script('js/panel-table-filter/panel-table-filter.js'); !!}

    <script>
    $(document).ready(function(){
        /* Esconde as divs que usar a class autoClose apos um tempo */
        setInterval(function(){ autoClose() }, 4500);
        /* Mascaras dos campos dos formularios */
        setMask();
        /* limpa as mascaras no submit */
        $('#form').submit(function(){
            clearMaskOnSubmit();
        });
        /* usando datepicker */
        $('.datepicker').datepicker({
            format: "dd/mm/yyyy"
        });

    });


    
    function autoClose() {
        $(".autoClose").hide("fast", function() {
        });
    }

    /* Configura as mascaras de input para os campos dos formularios*/
    function setMask() {
        $('.phone').mask('(99) 9999-9999');
        $('.cnpj').mask('999.999.999/9999-99');
        $('.money').mask('000000.00', {reverse: true});
    }

    /* confirma as mascaras dos inputs para limpar no submit */
    function clearMaskOnSubmit()
    {
        $('.phone').unmask();
        $('.cnpj').unmask();
    }

    </script>

    </body>
</html>