<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal A1</title>
</head>
<body>
  <div id="container">
    <label>Inputkan Jumlah Baris</label>
    <input type="number" id="row"><br>
    <label>Inputkan Jumlah Kolom</label>
    <input type="number" id="column"><br>
    <button onclick="inputColumn()">Submit</button>
  </div>
  <script>
    const result = (row, column) => {
      let container = ``;

      for (let i = 0; i < row; i++) {
        for (let j = 0; j < column; j++) {
          const value = document.getElementById(`${i}.${j}`).value;

          container += `<label>${i + 1}.${j + 1}: ${value}</label><br/>`;
        }
        container += `<br>`;
      }

      document.getElementById("container").innerHTML = container;
    }

    const inputColumn = () => {
      const row       = document.getElementById("row").value;
      const column    = document.getElementById("column").value;
      let container = ``;

      for (let i = 0; i < row; i++) {
        for (let j = 0; j < column; j++) {
          container += `
            <label>${i + 1}.${j + 1}</label>
            <input type="number" id="${i}.${j}">`;
        }
        container += `<br>`;
      }

      container += `<button onclick="result(${row}, ${column})">Submit</button>`;

      document.getElementById("container").innerHTML = container;
    }
  </script>
</body>
</html>