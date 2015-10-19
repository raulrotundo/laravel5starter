<!DOCTYPE html>
<html>
    <head>
        <title>{{trans('errors.503.title_page')}}</title>

        <link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #727B80;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1>{{trans('errors.503.content.title')}}</h1>
                <h2>{{trans('errors.503.content.subtitle')}}</h2>
            </div>
        </div>
    </body>
</html>
