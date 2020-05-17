# Ripple - IE Tech Challenge

The `server_info.php` PHP script periodically calls rippled’s server_info command and records the sequence number of the latest validated ledger along with the current time and record this data in the file data.txt. Then, uses this data to construct a plot (time on the x-axis, sequence number on the y-axis) with the Chart.js Javascript charting library that visualizes how frequently the ledger sequence is incremented every 5 seconds. 

## Getting Started

### Prerequisites

You need to be running PHP 5.4+ on a web server.

* Operating System: Linux, Unix, Windows, MacOS
* Web Server: Apache Web Server, LigHTTPD, IIS (with ISAPI_Rewrite installed)

### Installing

* [Clone](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/cloning-a-repository) this repository in a folder of your local webserver
* Modify the file persmission of the `data.txt` as follows: chmod -R 777 data.txt

### Running the code

This code is intented to use in a browser as shows a

* Make sure your webserver is running as a server
* With your browser open the web folder that includes the `server_info.php` file
* Open the `server_info.php` 


## Built With

* [PHP](https://www.php.net) - The programming language used
* HTML5 - Markup language
* [Bootstrap](https://getbootstrap.com/) - CSS responsive framework
* [ChartJS](https://www.chartjs.org/) - Plot charting library


## Authors

* Juan Saavedra - [Github](https://github.com/saavedrajj)
