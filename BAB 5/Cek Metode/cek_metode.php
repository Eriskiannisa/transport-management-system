<div class="page-wrapper">
    <div class="page-breadcrumb">
    	<div class="row">
        	<div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Cek Metode</h4>
                	<div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                    	<ol class="breadcrumb">
                    		<li class="breadcrumb-item"><a href="<?php echo site_url('dashboard') ?>">Dashboard</a></li>
                    		<li class="breadcrumb-item"><a href="<?php echo site_url('trip?status=complete') ?>">Manifest</a></li>
                    		<li class="breadcrumb-item active" aria-current="page">Cek Metode</li>
                    	</ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>North West Corner</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"/>
	<style>
		table {
			border-collapse: collapse;
			text-align: center;
		}
		th, td {
			border: 1px solid black;
			padding: 2.5px;
		}
		.cost, .blank {
			width: 50px;
		}
		.blank {
			border-bottom: 0;
		}
		.x {
			border-top: 0;
			height: 25px;
		}
		.supply, .demand {
			width: 50px;
		}
		.hidden1 {
			display: none;
		}
		.line-through {
			text-decoration: line-through;
		}
		.data
		{
			text-align:center;
			width:55px;
		}
	</style>
</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<div class="mt-4 col card-header text-center">
				<h2>Inisialisasi Tabel North West Corner</h2>
				<table class="table table-striped table-bordered">
					<tr>
						<td>Jumlah Kapasitas</td>
						<td>Jumlah Permintaan</td>
					</tr>
					<tr>
						<td><input type='text' id='supply' class='data'></td>
						<td><input type='text' id='demand' class='data'></td>
					</tr>
					<tr>
						<td colspan="3"><button type="button" class="btn btn-success" value='Input Banyak Data' onClick="banyak_data();">Input Data</button></td>
					</tr>
				</table>
		<div id='Kotak_Satu'></div><br>
		<div id='Kotak_Dua'></div><br>
		<div id='Kotak_Tiga'></div><br>

	<script type='text/javascript'>
		function banyak_data() {
			supply = parseFloat(document.getElementById('supply').value);
			demand = parseFloat(document.getElementById('demand').value);
			html = "";
			html = "<br><center><h2>Masukkan Jumlah Kapasitas dan Permintaan</h2></center><br>";
			html += "<table border='0' align='center'>";
			for (a = 0; a < supply; a++) {
				b = a + 1;
				html += "<tr><td align='left'>Kapasitas" + b + "</td><td align='left' colspan='2'><input type='text' id='supply_" + a + "' class='data'></td></tr>";
			}
			for (a = 0; a < demand; a++) {
				b = a + 1;
				html += "<tr><td align='left'>Permintaan " + b + "</td><td align='left' colspan='2'><input type='text' id='demand_" + a + "' class='data'></td></tr>";
			}
			html += "<tr align='right'><td colspan='2'><input type='button' class='btn btn-primary mt-2 mb-2' onClick=\"check_supdem(" + supply + "," + demand + ");\" value='Masukkan Nilai'>";
			html += "</td></tr></table><br>";
			document.getElementById('Kotak_Satu').innerHTML = html;
			document.getElementById('Kotak_Dua').innerHTML = "";
			document.getElementById('Kotak_Tiga').innerHTML = "";
		}

		function check_supdem(supply, demand) {
			supply_ = new Array();
			demand_ = new Array();
			nsupply_ = new Array();
			ndemand_ = new Array();
			jumlah_supply = 0;
			jumlah_demand = 0;
			alokasi = new Array();
			for (a = 0; a < supply; a++) {
				supply_[a] = parseFloat(document.getElementById('supply_' + a).value);
				nsupply_[a] = supply_[a];
				jumlah_supply += supply_[a];
			}
			for (a = 0; a < demand; a++) {
				demand_[a] = parseFloat(document.getElementById('demand_' + a).value);
				ndemand_[a] = demand_[a];
				jumlah_demand += demand_[a];
			}
			if (jumlah_supply == jumlah_demand) {
				html = "";
				html = "<br><center><h2>Masukkan Biaya Transportasi</h2></center><br>";
				html += "<table border='1' align='center'><tr><td align='center'></td>";

				for (a = 0; a < demand; a++) {
					b = a + 1;
					html += "<td align='center' colspan='2'> Permintaan " + b + "</td>";
				}

				html += "<td align='center'>Kapasitas</td>";

				for (a = 0; a <= demand; a++) {
					alokasi[a] = new Array();
					for (b = 0; b <= supply; b++) {
						if (nsupply_[b] != 0) {
							if (ndemand_[a] > nsupply_[b]) {
								alokasi[a][b] = nsupply_[b];
								nsupply_[b] = 0;
								ndemand_[a] = ndemand_[a] - alokasi[a][b];
							}
							else {
								alokasi[a][b] = ndemand_[a];
								ndemand_[a] = 0;
								nsupply_[b] = nsupply_[b] - alokasi[a][b];
							}
							if (alokasi[a][b] == 0) {
								alokasi[a][b] = "";
							}
						}
						else {
							alokasi[a][b] = "";
						}
					}
				}

				for (a = 0; a < supply; a++) {
					b = a + 1;
					html += "<tr><td align='center' rowspan='2'>Kapasitas " + b + "</td>";

					for (c = 0; c < demand; c++) {
						html += "<td width='70px' rowspan='2' align='center'><font color='red'>" + alokasi[c][a] + "</font></td><td align='center'><input type='text' id='cost_" + c + "." + a + "' class='data'></td>";
					}
					html += "<td align='center' rowspan='2'><font color='#0033FF'>" + supply_[a] + "</font></td></tr><tr>";

					for (d = 0; d < demand; d++) {
						html += "<td align='center'height='20px'></td>";
					}
					html += "</tr>";
				}

				html += "<tr><td align='left'>Permintaan</td>";

				for (a = 0; a < demand; a++) {
					html += "<td align='center' colspan='2'><font color='#0033FF'>" + demand_[a] + "</font></td>";
				}
				data = (demand * 2) + 2;
				html += "<td align='center'><font color='#CC00FF'>" + jumlah_supply + "</font></td></tr></table>";
				html += "<table><tr><td colspan='" + data + "' align='center'><input type='button' onclick=\"hitung_biaya('" + supply + "," + demand + "');\" value='Hitung Biaya'></td></tr>";
				html += "</table><br>";
				document.getElementById('Kotak_Dua').innerHTML = html;
				document.getElementById('Kotak_Tiga').innerHTML = "";
			}
			else {
				alert('Jumlah Supply dan Demand Harus Sama');
			}
		}

		function hitung_biaya(supply, demand) {
			cost = new Array();
			alokasi = new Array();
			supply_ = new Array();
			demand_ = new Array();
			nsupply_ = new Array();
			ndemand_ = new Array();
			jumlah_supply = 0;
			jumlah_demand = 0;
			biaya_optimal = 0;
			supply = parseInt(document.getElementById('supply').value);
			demand = parseInt(document.getElementById('demand').value);
			for (a = 0; a < demand; a++) {
				cost[a] = new Array();
				for (c = 0; c < supply; c++) {
					cost[a][c] = parseFloat(document.getElementById('cost_' + a + '.' + c).value);
				}
			}
			for (a = 0; a < supply; a++) {
				supply_[a] = parseFloat(document.getElementById('supply_' + a).value);
				nsupply_[a] = supply_[a];
				jumlah_supply += supply_[a];
			}
			for (a = 0; a < demand; a++) {
				demand_[a] = parseFloat(document.getElementById('demand_' + a).value);
				ndemand_[a] = demand_[a];
				jumlah_demand += demand_[a];
			}
			for (a = 0; a <= demand; a++) {
				alokasi[a] = new Array();
				for (b = 0; b <= supply; b++) {
					if (nsupply_[b] != 0) {
						if (ndemand_[a] > nsupply_[b]) {
							alokasi[a][b] = nsupply_[b];
							nsupply_[b] = 0;
							ndemand_[a] = ndemand_[a] - alokasi[a][b];
						}
						else {
							alokasi[a][b] = ndemand_[a];
							ndemand_[a] = 0;
							nsupply_[b] = nsupply_[b] - alokasi[a][b];
						}
						if (alokasi[a][b] == 0) {
							alokasi[a][b] = "";
						}
					}
					else {
						alokasi[a][b] = "";
					}
				}
			}
			html = "";
			html = "<br><center><h2>Hasil Untuk Metode Transportasi NorthWest Corner</h2></center><br>";
			html += "<table border='1' align='center'><tr><td align='center'></td>";
			for (a = 0; a < demand; a++) {
				b = a + 1;
				html += "<td align='center' colspan='2'> Demand " + b + "</td>";
			}

			html += "<td align='center'>Supply</td>";
			for (a = 0; a < supply; a++) {
				b = a + 1;
				html += "<tr><td align='center' rowspan='2'>Supply " + b + "</td>";
				for (c = 0; c < demand; c++) {
					html += "<td width='70px' rowspan='2' align='center'><font color='red'>" + alokasi[c][a] + "</font></td><td align='center' class='data'>" + cost[c][a] + "</td>";
					if (alokasi[c][a] == "") {
						alokasi[c][a] = 0;
					}
					biaya_optimal += (alokasi[c][a] * cost[c][a]);
				}

				html += "<td align='center' rowspan='2'><font color='#0033FF'>" + supply_[a] + "</font></td></tr><tr>";

				for (d = 0; d < demand; d++) {
					html += "<td align='center'height='20px'></td>";
				}
				html += "</tr>";
			}
			html += "<tr><td align='left'>Demand</td>";
			for (a = 0; a < demand; a++) {
				html += "<td align='center' colspan='2'><font color='#0033FF'>" + demand_[a] + "</font></td>";
			}
			html += "<td align='center'><font color='#CC00FF'>" + jumlah_supply + "</font></td></tr></table><br>";
			html += "<h3>Jadi Biaya Yang Dikeluarkan Adalah <span style='color:red;'> Rp." + biaya_optimal + "</span></h3><br>";
			document.getElementById('Kotak_Tiga').innerHTML = html;
		}
	</script>
			</div>
		</div>
	</div>

</body>

</html>

                  
                    </div>
                </div>
            </div>