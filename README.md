# Ripple - IE Tech Challenge

The server_info.php PHP script periodically calls rippled’s server_info command and records the sequence number of the latest validated ledger along with the current time and record this data in the file data.txt. Then, uses this data to construct a plot (time on the x-axis, sequence number on the y-axis) with the Chart.js Javascript charting library that visualizes how frequently the ledger sequence is incremented every 5 seconds. 

## Getting Started

### Prerequisites

What things you need to install the software and how to install them


```
Give examples
```

### Installing

A step by step series of examples that tell you how to get a development env running

Say what the step will be

chmod -R 777 ./

```
Give the example
```

And repeat

```
until finished
```

End with an example of getting some data out of the system or using it for a little demo

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
* [ChartJS](https://www.chartjs.org/) - Plot charting library

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Juan Saavedra** - *Initial work* - [Github](https://github.com/saavedrajj)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

