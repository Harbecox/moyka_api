@extends("layouts.app")

@section("page_title") {{ $company->name }} @endsection

@section("content")
    <script src="https://api-maps.yandex.ru/2.1/?apikey=03cea9f4-4c24-4f7b-ba2e-67c59b5477d8&lang=ru_RU" type="text/javascript"></script>


    <div id="map" style="height: 400px"></div>

    <script>
        if (document.getElementById("map")) {
            ymaps.ready(init);

            function init() {
                //var squareLayout = ymaps.templateLayoutFactory.createClass('<div class="marker_container"><span class="marker_label">380000 ₽</span></div>');
                var myMap = new ymaps.Map("map", {
                        center: [{{ $company->lat }},{{ $company->lng }}],
                        zoom: 10
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),


                    myGeoObject = new ymaps.GeoObject({
                        // Описание геометрии.
                        geometry: {
                            type: "Point",
                            coordinates: [{{ $company->lat }},{{ $company->lng }}]
                        },
                    }, {
                        //iconLayout: squareLayout,
                        iconShape: {
                            type: 'Rectangle',
                            // Прямоугольник описывается в виде двух точек - верхней левой и нижней правой.
                            coordinates: [
                                [-25, -25], [25, 25]
                            ]
                        },
                        draggable: false,
                    });

                myMap.geoObjects
                    .add(myGeoObject)

            }

        }
    </script>
@endsection
