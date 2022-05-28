@extends("layouts.app")

@section("page_title") {{ $pack->name }} @endsection

@section("content")
    <script src="https://api-maps.yandex.ru/2.1/?apikey=03cea9f4-4c24-4f7b-ba2e-67c59b5477d8&lang=ru_RU" type="text/javascript"></script>


    <div id="map" style="height: 400px"></div>

    <script>
        if (document.getElementById("map")) {
            ymaps.ready(init);

            function init() {
                var myMap = new ymaps.Map("map", {
                        center: [40.201325, 44.509799],
                        zoom: 10
                    }, {
                        searchControlProvider: 'yandex#search'
                    });
                    let squareLayout;
                    @foreach($pack->companies as $company)
                        myGeoObject = new ymaps.GeoObject({
                            geometry: {
                                type: "Point",
                                coordinates: [{{ $company->lat }}, {{ $company->lng }}]
                            },
                        }, {
                            iconLayout: squareLayout,
                            iconShape: {
                                type: 'Rectangle',
                                coordinates: [
                                    [-25, -25], [25, 25]
                                ]
                            },
                            draggable: false,
                        });
                        myMap.geoObjects
                            .add(myGeoObject)
                    @endforeach

            }

        }
    </script>
    <style>
        .marker_container{
            padding: 10px;
            white-space: nowrap;
            background-color: #fff;
        }

        .marker_label{

        }
    </style>
@endsection
