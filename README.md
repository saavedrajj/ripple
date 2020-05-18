# Ripple - IE Tech Challenge

The `server_info.php` PHP script periodically calls rippled’s server_info command and records the sequence number of the latest validated ledger along with the current time and record this data in the file `data.txt`. Then, uses this data to construct a plot (time on the x-axis, sequence number on the y-axis) with the Chart.js Javascript charting library that visualizes how frequently the ledger sequence is incremented every 5 seconds. 

## Getting Started

### Prerequisites

You need to be running PHP 5.4+ on a web server.

* Operating System: Linux, Unix, Windows, MacOS.
* Web Server: Apache Web Server, LigHTTPD, IIS (with ISAPI_Rewrite installed).

### Installation

* [Clone](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/cloning-a-repository) this repository in a folder of your local webserver
* Modify the `data.txt` file persmissions as follows: 
```
$ chmod -R 777 data.txt
```

### Running the code

This script is intented for using in a web browser. 

* Make sure your webserver is running as a service.
* Open the web folder that includes the `server_info.php` file.
* Select the `server_info.php` file.

## Built With

* [PHP](https://www.php.net) - General-purpose scripting language especially suited to web development.
* [cURL](https://curl.haxx.se/) - library for transferring data with URLs.
* HTML5 - Markup language.
* [Bootstrap](https://getbootstrap.com/) - CSS responsive framework.
* [ChartJS](https://www.chartjs.org/) - JavaScript Plot charting library.

## Author

* Juan Saavedra - [Github](https://github.com/saavedrajj)