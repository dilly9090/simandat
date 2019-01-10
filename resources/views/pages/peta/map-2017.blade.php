<div class="map-container" id="peta"></div>
@php
    // dd($dprovinsi);
@endphp
<script>
$("#peta").mapSvg({
    width: 792.54596,
    height: 317,
    colors: {
        baseDefault: "#000000",
        background: "#fffff",
        selected: 40,
        hover: 21,
        directory: "#fafafa",
        status: {},
        base: "#195fc7"},
        viewBox: [0,-0.16802999999998747,792.54596,317],
        cursor: "pointer",
        tooltips: {mode: "title",on: false,priority: "local",position: "bottom-right"},
        gauge: {
            on: false,
            labels: {
                low: "low",
                high: "high"
                            },
                        colors: {
                lowRGB: {
                    r: 85,
                    g: 0,
                    b: 0,
                    a: 1
                },
                highRGB: {
                    r: 238,
                    g: 0,
                    b: 0,
                    a: 1
                },
                low: "#550000",
                high: "#ee0000",
                diffRGB: {
                    r: 153,
                    g: 0,
                    b: 0,
                    a: 0
                }
            },
            min: 0,
            max: false
        },
        source: APP_URL+"/indonesia.svg",
        title: "Indonesia",
        markers:
            [ <?php foreach($provinsi as $lokasi) { 
                if(isset($dprovinsi[$lokasi->name]))
                {
                    $kjd='';
                    $jlhh=$kejadian_provinsi[$lokasi->name]['Jumlah'];
                    foreach($kejadian_provinsi[$lokasi->name] as $idx=>$val)
                    {
                        $kjd.="<div style='width:100%;float:left'>";
                        $kjd.="<div style='width:55%;float:left'>$idx</div>";
                        $kjd.="<div style='width:3%;float:left'>:</div>";
                        $kjd.="<div style='width:41%;float:left'>".($val)." kejadian</div>";
                        $kjd.="</div>";
                        
                    }
                ?>
                {
                    attached: true,
                    isLink: false,
                    tooltip: "<?php echo $lokasi->name ?>",
                    popover: "<b>{{$lokasi->name}}<br>{{$jlhh}} Total Kejadian</b><br>{!!$kjd!!}",
                    data: {},
                    src: "{{asset('assets/images/pin1_orange.png')}}",
                    width: 15,
                    height: 24,
                    geoCoords: [<?php echo $lokasi->lattitude ?>,<?php echo $lokasi->longitude ?>]
                    }, 
                <?php 
                }
            } ?>
            ],
        responsive: true
    });
</script>
<style>
.mapsvg-popover
{
    max-height:250px !important;
    height:250px !important;
}
</style>