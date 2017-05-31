@extends('app')
<style>
    #map {
        height:50%;
        width: 100%;
    }
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
</style>

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h3>Your location:</h3>
                <table class="table table-condensed">
                    <tr>
                        <th>IP</th>
                        <th>Country</th>
                        <th>City</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                    </tr>
                    <tr>
                        <td>{{$currentVisitor->ip}}</td>
                        <td>{{$currentVisitor->country}}</td>
                        <td>{{$currentVisitor->city}}</td>
                        <td>{{$currentVisitor->lat}}</td>
                        <td>{{$currentVisitor->lng}}</td>
                    </tr>
                </table>

                <p>Unique visitors: {{ $visitorsCount }}</p>
                <p>Unique visitors today: {{ $visitorsPerDay }}</p>

                <div id="map"></div>
                <script>

                    function initMap() {
                        var myLatLng = {lat: 0, lng: 0};

                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 2,
                            center: myLatLng
                        });

                        <?php foreach ($visitorCollection as $item): ?>
                            var l = parseInt("<?php echo $item->lat ?>");
                            var g = parseInt("<?php echo $item->lng ?>");
                            var myLatLngVisitor = {lat: l, lng: g};

                            var marker = new google.maps.Marker({
                                position: myLatLngVisitor,
                                map: map,
                                title: "<?php echo $item->ip ?>"
                            });
                        <?php endforeach; ?>
                    }
                </script>

                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVr2RcJJQmf_vPklKCo27jfAyx6bs0QX8&callback=initMap">
                </script>
            </div>
        </div>
    </div>
@endsection