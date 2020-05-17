# Ripple - IE Tech Challenge

The server_info.php PHP script periodically calls rippled’s server_info command and records the sequence number of the latest validated ledger along with the current time and record this data in the file data.txt. Then, uses this data to construct a plot (time on the x-axis, sequence number on the y-axis) with the Chart.js Javascript charting library that visualizes how frequently the ledger sequence is incremented every 5 seconds. 

## Getting Started

### Prerequisites

You need to be running PHP 5.4+ on a web server.


* Operating System: Linux, Unix, Windows, MacOS
* Web Server: Apache Web Server, LigHTTPD, IIS (with ISAPI_Rewrite installed)

### Installing

* Clone this repository in your a folder of your local webserver

* chmod -R 777 ./

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Built With

* [PHP](https://www.php.net) - The programming language used
* HTML5 - Markup language
* [Bootstrap](https://getbootstrap.com/) - CSS responsive framework
* [ChartJS](https://www.chartjs.org/) - Plot charting library


## Authors

* **Juan Saavedra** - [Github](https://github.com/saavedrajj)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

