@extends('layouts.app')
@section('head')
    <style>
        .doc-viewer {
            width: 95%;
            background-color: #eff3fd;
            box-shadow: #00000043 2px 2px 2px;
        }
    </style>
@endsection
@section('content')
    <main>

        <div class="container-fluid p-0 m-0 d-flex justify-content-end align-items-center"
            style="background-image: url({{ asset('images/documents-banner.png') }});  background-repeat: no-repeat; background-size: 100% auto;   min-height:240px;max-height: 260px; overflow: hidden; border-bottom: #000000 2px !important;">
            <h2 style="padding-right: 15%;"><u>{{$document->title}}</u></h2>
        </div>
        <div class="container-fluid" style="background-color: #eff3fd; padding-top: 2%; margin:0px;">

            <div class="container card mb-4 ">
                <div class="accordion" id="accordionExample">
                    @foreach($document->media as $key => $data)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $data->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $data->id }}">
                                    {{$document->title}} {{ $key+1 }}
                                </button>
                            </h2>

                            <div id="collapse{{ $data->id }}" class="accordion-collapse collapse"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body d-flex justify-content-center">
                                    <div class="container">
                                        <div class="row">
                                            <embed
                                                src="{{ url(basename(storage_path()) . '/' . $data?->file_path) }}"
                                                type="application/pdf" width="100%" height="600px" />
                                            <div id="pdf-container"></div>

                                            <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
                                            <script>
                                                var url = "{{ url(basename(storage_path()) . '/' . $data?->file_path) }}";

                                                pdfjsLib.getDocument(url).then(function(pdf) {
                                                    pdf.getPage(1).then(function(page) {
                                                        var scale = 1.5;
                                                        var viewport = page.getViewport({
                                                            scale: scale
                                                        });

                                                        var canvas = document.createElement('canvas');
                                                        var context = canvas.getContext('2d');
                                                        canvas.height = viewport.height;
                                                        canvas.width = viewport.width;

                                                        var renderContext = {
                                                            canvasContext: context,
                                                            viewport: viewport
                                                        };
                                                        page.render(renderContext).promise.then(function() {
                                                            document.getElementById('pdf-container').appendChild(canvas);
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>



    </main>
@endsection
@section('footer')
@endsection
