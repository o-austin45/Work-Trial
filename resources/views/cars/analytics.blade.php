<div>
  <canvas id="manus" width=200 height=100></canvas>
</div>
<div></div>
<div></div>
<div>

  <canvas id="fuelType"  width="100" height="100"></canvas>
</div>

<div>

  <canvas id="carModelsPurchased"  width="100" height="100"></canvas>
</div>

<div>

  <canvas id="purchasesOverTime"  width="100" height="100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
  let time = [];
  let sum = [];
  let manufacturer = @json($manufacturer);
  let carNumber = @json($carNumber);
  let fuelNumber = @json($fuelNumber);
  let fuelType = @json($fuelType);
  let cars = @json($cars);
let sumOrders = @json($sumOrders);

  if ( sumOrders !=sum [sum.length-1]) {
    sum.push(sumOrders);
    time.push(new Date());

  }
  const labels = manufacturer;

  const dataCars = {
    labels: manufacturer,
    datasets: [{
      label: 'Number of Cars Per Manufacturer',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: carNumber,
    }]
  };

  const dataFuels = {
    labels: fuelType,
    datasets: [{
      label: 'Number of Cars per fuelType',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data:fuelNumber,
    }]
  };


  const dataOrders = {
    labels: cars,
    datasets: [{
      label: 'Number of Cars Models Purchased',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data:orderQty,
    }]
  };

  const purchasesOverTime = {
  labels: time,
  datasets: [{
    label: 'My First Dataset',
    data: sum,
    fill: false,
    borderColor: 'rgb(75, 192, 192)',
    tension: 0.1
  }]
};

  const manusConfig = {
    type: 'bar',
    data: dataCars,
    options: {}
  };

  const fuelConfig = {
    type: 'bar',
    data: dataFuels,
    options: {}
  };

  const carModelsSoldConfig = {
    type: 'bar',
    data: dataOrders,
    options: {}
  };

  const purchasesOverTimeConfig = {
  type: 'line',
  data: purchasesOverTime,
};
</script>
 

<script>
  const myChart = new Chart(
    document.getElementById('manus'),
    manusConfig
  );
</script>

<script>
  const myChart2 = new Chart(
    document.getElementById('fuelType'),
    fuelConfig
  );
</script>

<script>
  const myChart3 = new Chart(
    document.getElementById('carModelsPurchased'),
    carModelsSoldConfig
  );
</script>

<script>
  const myChart4 = new Chart(
    document.getElementById('purchasesOverTime'),
    purchasesOverTimeConfig
  );
</script>




