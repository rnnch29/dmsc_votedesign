// // include("../core/incLang.php");

const data = [{
    "name": "cakes",
    "data": [
      [
        "us",
        149045
      ],
      [
        "es",
        417460
      ],
      [
        "uk",
        37640
      ],
      [
        "au",
        16594
      ]
    ],
  
    "marker": {
      "symbol": "circle"
    }
  }, {
    "name": "pie",
    "data": [
      [
        "us",
        128845
      ],
      [
        "es",
        35752
      ],
      [
        "uk",
        32246
      ],
      [
        "au",
        14333
      ]
    ],
    "marker": {
      "symbol": "circle"
    }
  }, {
    "name": "pie",
    "data": [
      [
        "us",
        128845
      ],
      [
        "es",
        35752
      ],
      [
        "uk",
        32246
      ],
      [
        "au",
        14333
      ]
    ],
    "marker": {
      "symbol": "circle"
    }
  }
  ]
  
  const mainContainer = document.getElementById('mainContainer');
  
  data.forEach(function(dataEl) {
    const createdDiv = document.createElement('div');
    createdDiv.style.display = 'inline-block';
    createdDiv.style.width = 100 / data.length + '%'
  
    mainContainer.appendChild(createdDiv);
  
    Highcharts.chart(createdDiv, {
      chart: {
        type: 'pie',
        zoomType: 'xy'
      },
      title: {
        text: dataEl.name // เพิ่ม title โดยใช้ชื่อจาก dataEl.name
      },
      plotOptions: {
        pie: {
          allowPointSelect: true,
          cursor: 'pointer',
          dataLabels: {
            enabled: true,
            //format: '{series.data[0]} <b>{point.percentage:.1f}%</b>'
          }
        },
      },
      series: [dataEl]
    });
  });
  

  <?php
$sqlSelect = "
    " . $core_tb_vote . "_q1
";
$sql = "SELECT " . $sqlSelect . ", COUNT(*) AS count_per_category 
        FROM " . $core_tb_vote . " 
        WHERE " . $core_tb_vote . "_masterkey ='vote'
        GROUP BY " . $core_tb_vote . "_q1";
        // print_r($sql);die();
$query = wewebQueryDB($coreLanguageSQL, $sql);


$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $data[] = array(
        'name' => $row[$core_tb_vote . '_q1'],
        'y' => (int)$row['count_per_category']
    );
}

// Convert the PHP data to JSON format for use in JavaScript
$jsonData = json_encode($data);
?>