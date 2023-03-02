USE master;
GO

IF DB_ID('tips_telemetry') IS NOT NULL
BEGIN
    DROP DATABASE tips_telemetry;
END
GO

-- create the database
CREATE DATABASE tips_telemetry;
GO

-- switch to the new database
USE tips_telemetry;
GO

-- create the table
CREATE TABLE telemetry_table (
    link VARCHAR(200) PRIMARY KEY,
    pageviews INT,
    unique_pageviews INT,
    average_time VARCHAR(50),
    entrances INT,
    bounce_rate VARCHAR(50),
    exit_percent VARCHAR(50),
    page_value VARCHAR(50)
);

-- insert data into the table
INSERT INTO telemetry_table (link, pageviews, unique_pageviews, average_time, entrances, bounce_rate, exit_percent, page_value)
VALUES ('/en/rebates-and-savings-tips/energy-savings-tips'  , 11439, 10289, '00:01:23', 7659, '73.62%', '67.53%', '$0.00'),
       ('/en/rebates-and-savings-tips/'  , 4471, 4208, '00:01:33', 3846, '86.44%', '85.54%', '$0.00'),
       ('/en/'                                       , 4471, 4208, '00:01:33', 3846, '86.44%', '85.54%', '$0.00'),
       ('/energytips'                                       , 11439, 10289, '00:01:23', 7659, '73.62%', '67.53%', '$0.00'),
       ('/energysavings'                                       , 11439, 10289, '00:01:23', 7659, '73.62%', '67.53%', '$0.00'),
       ('/energydying'                                       , 4471, 4208, '00:01:33', 3846, '86.44%', '85.54%', '$0.00');
GO