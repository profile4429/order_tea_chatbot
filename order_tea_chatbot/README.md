# order_tea_chatbot

## Introduction
This is an order tea chatbot made using the Rasa framework. It can be integrated into multiple platforms, such as websites, Facebook Messenger, etc., helping the owner of a Tea Shop to receive orders from customers in an engaging and new way. With this chatbot, customers can interact as if they were speaking to a staff member, inquiring about the Tea Shop, the menu, different tea options, and even place an order immediately by providing their name, phone number, address. However, due to limitations, this chatbot may work better in a smaller city rather than a larger region.

## Features
### 1. Answer some questions.
It can answer some questions from customers, such as inquiring about the menu, whether a beverage is being sold, beverage prices, and bot features. Additionally, it can greet customers politely whenever they say hi.

### 2. Place an order
Whenever customers want to place an order, the bot will ask a series of questions to collect all the necessary information, such as the type of beverage, size, quantity, and customer's details (phone number, name, address). After gathering the required information, it will save the order details. In the event that a customer places an order for the second time or more, the bot will recognize their name when they provide their phone number.

## How to install

Open your terminal

Clone this repo

```bash
git clone https://github.com/fridaytd/order_tea_chatbot.git
```
Navigate to the project directory

```bash
cd order_tea_chatbot
```

Create new virtual environment

```bash
python -m venv .env
```
Activate the virtual environment (using properly file for your OS, my case in windows and i'm using PowerShell)

```bash
.env\Scripts\Activate.ps1
```
Install dependences

```bash
pip install -r .\requirements.txt
```
First train model

```bash
rasa train
```
Waiting for training finish...

Run rasa server
```bash
rasa run -m models --enable-api --cors "*"
```

Open new terminal in this direction and activate virtual environment

Run actions server

```bash
rasa run actions
```

Open one more new terminal in this direction and activate virtual environment

Run http server (in case you integrate in your appication, skip this step)

```bash
python -m http.server
```
