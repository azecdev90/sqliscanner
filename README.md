# sqliscanner - [ Tool for automation exploiting SQL injection vulnerability ]

<p align="center">
  <img src="https://user-images.githubusercontent.com/58860019/150654821-8782daf9-fdf9-43ec-849d-b62a661f7d3b.png" />
</p>


<p align="center">

<img alt="GitHub release (latest by date)" src="https://img.shields.io/github/v/release/azecdev90/sqliscanner">
 <img alt="GitHub issues" src="https://img.shields.io/github/issues/azecdev90/sqliscanner">
 <img alt="GitHub Discussions" src="https://img.shields.io/github/discussions/azecdev90/sqliscanner?color=27ae60">
 <img alt="GitHub code size in bytes" src="https://img.shields.io/github/languages/code-size/azecdev90/sqliscanner?color=e74c3c">
 <img alt="GitHub contributors" src="https://img.shields.io/github/contributors/azecdev90/sqliscanner">
</p>

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Requirements](#requirements)
- [How to use](#how-to-use)
- [Contribute to project](#contribute-to-project)
  - [Feedback](#feedback)
  - [Make pull request](#make-pull-request)
  - [Translatations](#translations)
- [Contributors](#contributors)
- [Support project](#support)
- [License](#license)   


## Introduction
Testing SQL injection vulnerability and exploiting it by hand, could be too hard for beginners in cyber security. Sqliscanner is a command-line utility that tool automates process testing and exploits that vulnerability. The goal of this tool is to make easier process of discovering vulnerability and to show the consequences of exploiting unprotected web pages. It is highly forbidden to use this tool for illegal purposes.       

## Features
Basic features what you can do with sqliscanner

- Discovering is URL vulnerable on SQL injection attack
- Count number of columns in current table
- Find vulnerable column in SQL query
- Display all databases in target URL
- View all tables in a specific database
- Show data from a specific database



## Requirements
### Setup environment
To run this tool you need to have an installed a [PHP](www.php.net) interpreter and [cURL](https://curl.se/) library. cURL library is PHP extension, and it is part of PHP core. For beginners, I suggest installing [Xampp](https://www.apachefriends.org/index.html).

If you have already installed PHP interpreter, you could check easily if your PHP have cURL installed and loaded with command
`get_loaded_extensions()`

### Download and run project
```
Clone sqliscanner project from Github
$ git clone https://github.com/azecdev90/sqliscanner.git

Go into directory
$ cd sqliscanner
```
## How to use
Scan URL and check is URL vulnerable    
```
// php sqliscanner.php --url [urlToScan]    [injectableParam]  
   php sqliscanner.php --url http://targeturl/page.php?id=1  
```  

Return all tables database from URL  
```
// php sqliscanner.php --url [urlToScan]    [injectableParam]        [nameOfDatabase]  
   php sqliscanner.php --url http://targeturl/page.php?id=1 --database projectName
```
Display data from specific table
```
// php sqliscanner.php --url [urlToScan]    [injectableParam]        [nameOfDatabase]  [nameOfTable]
   php sqliscanner.php --url http://targeturl/page.php?id=1 --database projectName --table users
```
List all commands
```
// php sqliscanner.php --help [--help | -h] 
   php sqliscanner.php --help 
   ```
## Contribute to project
In the next chapter are presented ways how you can contribute to this tool. There are three main ways how you can contribute to this project. If your suggestion does not fall under the next three categories, this does not limit you to getting involved in the contribution process. If this is a option with you, do not hesitate to open an issue, and share your idea with us, about how we can make this tool better.
 
### Feedback
Experience you gain after usage of this software gives you insight, not only how this tool works, but what are pros and cons. After usage of this tool, you can share your experience with us about your impression. Your ideas and critiques could help us to get an insight what things could be changed in the next versions. As well, we expect if you notice some bugs during usage of this software to share with us, so we can fix it 
### Make pull request
[![PRs Welcome](https://img.shields.io/badge/PRs-welcome-brightgreen.svg?style=flat-square)](https://makeapullrequest.com)  
Because of our strong beliefs in principles of open source, and the privilege that open-source brought on the productivity of software development, joining our development team and our work on this is welcome. According to that, we encourage and support all Pull requests made with a purpose to improve this tool.
- Fork project on your local machine
- Make some changes
- Push code to your Github repository
- Make PR to this repository
- Code will be a reviewed, and if your code satisies our criteria, we will accept your improvements
- Your name will be added to the [Contributors list](#contributors)



### Translations

We made Readme file in English because of language prevalence. You can contribute to this project by translating this Readme file to your native language. It is highly important that we translate this project to a wide specter of different languages, and make this tool available for peoples who do not speak the English language.

#### How to translate
- Fork branch *translation*
- In folder translations create file with structure [translation][languagename] [ *translationEN*, *translationDE* ]
- Translate the document
- Push your changes to Github
- Make Pull request

#### Available translations

## Contributors
Here is a list of all contributors to this project.


## Support
If you are satisfied with this tool, or if this tool helps you to discover potential holes in your app or you want to help us to continue work on this project, you can buy us a coffee! 

## License
> You can check out the full license [here](https://opensource.org/licenses/MIT)
  
This project is licensed under the terms of the MIT license.




