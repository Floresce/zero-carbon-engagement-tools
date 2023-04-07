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
    tip_id VARCHAR(200) PRIMARY KEY,
    tip_description VARCHAR(200),
    likes INT,
    dislikes INT,
    added_plans INT,
    viewcount INT,
    unique_viewcount INT,
    exit_percent VARCHAR(200)
);

-- insert data into the table
INSERT INTO telemetry_table (tip_id, tip_description, likes, dislikes, added_plans, viewcount, unique_viewcount, exit_percent)
VALUES ('1', 'Smart Home', 7289, 867, 100, 25000, 1, '67.53%'),
       ('2', 'Habit Changing', 4860, 654, 200, 18000, 1, '85.54%'),
       ('3', 'Washer & Dryer', 5346, 76, 300, 42000, 1, '85.54%'),
       ('4', 'Dishwasher', 6543, 674, 400, 00000, 1, '67.53%'),
       ('5', 'Refriderator', 9365, 99, 500, 21222, 1, '67.53%'),
       ('6', 'Maintenance', 2321, 5000, 666, 1, 1, '85.54%');
GO

CREATE TABLE user_behavior (
    timestamp_date INT PRIMARY KEY,
    liked_tips VARCHAR(50),
    disliked_tips VARCHAR(50),
    comments VARCHAR(50),
    user_agent VARCHAR(500)
);

INSERT INTO user_behavior (timestamp_date, liked_tips, disliked_tips, comments, user_agent)
VALUES (1676471890, 'Summer thermostat, Oven efficiency', 'N/A', 'This tips not sucks', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_3_1 like Mac OS X) AppleWebKit/604.1'),
        (1673035050, 'N/A', 'Thaw food in your fridge', 'This tips sucks', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36')
GO