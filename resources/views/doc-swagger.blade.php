@extends('layout')

@section('title', 'Documentation API')

@section('scripts')
    <link rel="stylesheet" type="text/css" href="{{ asset('swagger/swagger-ui.css') }}" />
    <link rel="icon" type="image/png" href="{{ asset('swagger/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('swagger/favicon-16x16.png') }}" sizes="16x16" />
    <script src="{{ asset('swagger/swagger-ui-bundle.js') }}" charset="UTF-8"> </script>
    <script src="{{ asset('swagger/swagger-ui-standalone-preset.js') }}" charset="UTF-8"> </script>

    <script>
        window.onload = function() {
            // Begin Swagger UI call region
            const ui = SwaggerUIBundle({
                url: "{{ asset('swagger/swagger.json') }}",
                dom_id: '#swagger-ui',
                deepLinking: true,
                enableCORS:false,
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],
                layout: "StandaloneLayout"
            });
            // End Swagger UI call region

            window.ui = ui;
        };
    </script>
@endsection

@section('main')
    <br>
    <div id="swagger-ui"></div>
    <br>
@endsection
