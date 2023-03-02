CREATE TABLE SUBCATEGORY(
  SUB_ID INT NOT NULL PRIMARY KEY,
  SUB_NAME VARCHAR(50)
);

 
INSERT INTO SUBCATEGORY VALUES(1, 'Smart Home');
INSERT INTO SUBCATEGORY VALUES(2, 'Habit Changing');
INSERT INTO SUBCATEGORY VALUES(3, 'Washer & Dryer');
INSERT INTO SUBCATEGORY VALUES(4, 'Dishwasher');
INSERT INTO SUBCATEGORY VALUES(5, 'Refrigerator');
INSERT INTO SUBCATEGORY VALUES(6, 'Electric vehicles');
INSERT INTO SUBCATEGORY VALUES(7, 'Appliances');
INSERT INTO SUBCATEGORY VALUES(8, 'Maintenance');
INSERT INTO SUBCATEGORY VALUES(9, 'Insulation & Sealing');
INSERT INTO SUBCATEGORY VALUES(10, 'Pools & Spas');
INSERT INTO SUBCATEGORY VALUES(11, 'Thermostat');
INSERT INTO SUBCATEGORY VALUES(12, 'Fans');
INSERT INTO SUBCATEGORY VALUES(13, 'Sealing');
INSERT INTO SUBCATEGORY VALUES(14, 'N/A');

 
CREATE TABLE CATEGORY(
  C_ID INT NOT NULL PRIMARY KEY,
  C_NAME VARCHAR(50)
);

INSERT INTO CATEGORY VALUES(1, 'Appliances');
INSERT INTO CATEGORY VALUES(2, 'Around Town');
INSERT INTO CATEGORY VALUES(3, 'Around Your Home');
INSERT INTO CATEGORY VALUES(4, 'Cooking');
INSERT INTO CATEGORY VALUES(5, 'Heating & Cooling');
INSERT INTO CATEGORY VALUES(6, 'On Vacation');


CREATE TABLE TIPS(
    
  T_ID INT NOT NULL PRIMARY KEY, 
  T_DESC_ENGLISH VARCHAR(550),
  T_DESC_SPANISH VARCHAR(550),
  RATE VARCHAR(50),
  PRIMARY_LINK VARCHAR(MAX),
  SECONDARY_LINK VARCHAR(MAX),
  C_ID INT NOT NULL FOREIGN KEY REFERENCES CATEGORY(C_ID),
  SUB_ID INT NOT NULL FOREIGN KEY REFERENCES SUBCATEGORY(SUB_ID),
);

 

INSERT INTO TIPS VALUES(1, 'Use smart strips so you can easily turn off multiple appliances at once.', NULL, NULL, 
NULL, NULL, 1, 1);

INSERT INTO TIPS VALUES(2, 'Replace appliances with an Energy Star® model—they''re up to 40% more efficient than older models.', NULL, NULL, 
NULL, NULL, 1, 14);

INSERT INTO TIPS VALUES(3, 'Wash full loads of laundry whenever possible and switch your temperature setting from hot to warm to cut energy use in half for a single load. Using the cold cycle can reduce energy use even more. About 90% of the energy consumed for washing clothes is used to heat the water.', NULL, NULL,  
NULL, NULL, 1, 2);

INSERT INTO TIPS VALUES(4, 'Unplug small appliances and electronics, like coffee makers and printers when not in use. These items continue using power as long as they''re plugged in.', NULL, NULL,
NULL, NULL, 1, 2);

INSERT INTO TIPS VALUES(5, 'Hang dry your laundry. A typical clothes Dryer uses up to four times more energy than a new clothes Dryer. Hang-drying saves energy and reduces wear and tear on clothes, which helps them last longer.', NULL, NULL, 
NULL, NULL, 1, 3);

INSERT INTO TIPS VALUES(6, 'Your dishwasher uses a lot of energy, especially for heating water. To cut down on energy use, run only full loads and let your dishes air dry. For added savings, use the delay start feature to run your dishwasher between midnight and noon to take advantage of off-peak prices.', NULL, NULL, 
NULL, NULL, 1, 4);

INSERT INTO TIPS VALUES(7, 'About 90% of the energy consumed for washing clothes is used to heat the water. Unless your clothes have oily stains, washing with cold or warm water will clean your clothes just as effectively.', 'Aproximadamente el 90% de la energía consumida para lavar ropa se usa para calentar el agua. A menos que su ropa tenga manchas de aceite, lavarla con agua fría o tibia será igual de efectivo.', NULL,  
NULL, NULL, 1, 3);

INSERT INTO TIPS VALUES(8, 'Set your fridge to 38 degrees. In the average home, the refrigerator consumes the most energy of all kitchen appliances. Make sure your refrigerator is not too cold in order to minimize the annual costs.', 'Ajuste el refrigerador a 38 grados. En un hogar promedio, el refrigerador consume la mayor cantidad de energía de todos los electrodomésticos de la cocina. Asegúrese de que el refrigerador no esté demasiado frío para minimizar los costos anuales.', NULL, 
NULL, NULL, 1, 5);


INSERT INTO TIPS VALUES(9, 'Go electric. Most people drive less than 40 miles a day. If that''s you, then almost any EV will meet your needs. You''ll save on fuel costs and reduce your emissions. Get started at smud.org/DriveElectric.', NULL, NULL, 
NULL, NULL, 2, 14);

INSERT INTO TIPS VALUES(10, 'Go reusable. Choose reusable products (like a reusable water bottle) instead of single-use throwaways to curb waste and reduce the burden on landfills.', NULL, NULL, 
NULL, NULL, 2, 2);

INSERT INTO TIPS VALUES(11, 'Participate in community cleanup. Volunteer for cleanups in your community. A cleaner community is a healthier and more beautiful community.', NULL, NULL, 
NULL, NULL, 2, 14);

INSERT INTO TIPS VALUES(12, 'Avoid plastic. Avoid products with excessive plastic packaging. You''ll help lower carbon emissions form producing, transporting and disposing of the plastic.', NULL, NULL,
NULL, NULL, 2, 2);

INSERT INTO TIPS VALUES(13, 'Eat local. Eat and shop local, like your local farmer''s market, to reduce transportation emissions.', NULL, NULL,
NULL, NULL, 2, 2);

INSERT INTO TIPS VALUES(14, 'Use your EV''s timer. Most EVs have a timer feature that can set the start time, end time or both, depending on your needs. Whenever possible, try to charge only during off-peak hours. Additionally, if you register your EV with SMUD, you can get a 1.5¢ credit on charging your EV between midnight and 6 a.m. every day, all year long on the Time-of-Day rate.', 
NULL, NULL, NULL, NULL, 2, 6);


INSERT INTO TIPS VALUES(15, 'Use your oven, stove, dishwasher, dryer, washing machine and other heat-producing appliances early in the morning or later in the evening, when temperatures are cooler.', NULL, NULL, 
NULL, NULL, 3, 7);

INSERT INTO TIPS VALUES(16, 'Install low-flow Showerheads and fix any leaky faucets.', NULL, NULL, 
'https://smudenergystore.com/water-fixtures/', NULL, 3, 8);

INSERT INTO TIPS VALUES(17, 'Curtains or blinds can act as additional insulation for windows, or can be opened to let in the sun''s heat.', NULL, NULL,
NULL, NULL, 3, 9);

INSERT INTO TIPS VALUES(18, 'When you''re not using lights and appliances, turn them off or unplug them if possible. Install light-sensitive controls or timers to automatically turn them off when they''re not needed.', NULL, NULL,
NULL, NULL, 3, 2);

INSERT INTO TIPS VALUES(19, 'Start or program your dishwasher, washing machine or clothes dryer to run and finish before 5 PM or start after 8 PM. Monday through Friday. You can save even more during the summer if you schedule household chores to finish before noon on weekdays or anytime on the weekends. Midnight to noon and all hours on weekends are at the lowest off-peak rate.', NULL, NULL,
NULL, NULL, 3, 2);

INSERT INTO TIPS VALUES(20, 'Be water smart. Water your lawn and gardens before 10 AM or after 10 PM to ensure your plants get the most of the water by minimizing evaporation.', NULL, NULL, 
NULL, NULL, 3, 2);

INSERT INTO TIPS VALUES(21, 'Shop smart ship smart. Consolidate your online purchases to reduce packaging and the number of shipments.', NULL, NULL, 
NULL, NULL, 3, 2);

INSERT INTO TIPS VALUES(22, 'Seal air leaks. In most homes, if you add up the air leaks, it is similar to leaving a window open. Sealing air leaks can save you up to 20% on your Heating & Cooling costs. Weatherstrip windows and doors and seal cracks with caulk.', NULL, NULL, 
NULL, NULL, 3, 13);

INSERT INTO TIPS VALUES(23, 'Reduce your water heater temperature. You can save up to 22% of energy spent on water heating annually by lowering the temperature of your water heater. On average try to keep it at 120F. Check the manual for safety instructions before making adjustments.', NULL, NULL, 
NULL, NULL, 3, 2);

INSERT INTO TIPS VALUES(24, 'Adjust your pool and spa pump runtime. Many pool and spa pumps are set to filter the volume two or more times per day, which is more than necessary. The proper run time depends on the season, the size of the pools and spas, and how much it is used, but a standard pump should typically run for no more than 6 hours during summer days. Variable-speed pumps use significantly less energy and should run for a longer period at a low speed.
For added savings, schedule your pump to run sometime between midnight and noon.', NULL, NULL,  
NULL, NULL, 3, 10);


INSERT INTO TIPS VALUES(25, 'Keep your kitchen cool and make meals that don''t require your oven. Use your grill or small appliances to cook food. Small appliances like microwaves, toaster ovens and pressure cookers, use about 66% less energy than a conventional oven.', NULL, NULL, 
NULL, NULL, 4, 2);

INSERT INTO TIPS VALUES(26, 'Choose the right pan for the job. Using a pan that is smaller than the burner can waste up to 40% of the energy produced by your stovetop. If you have an electric stove, be sure to use flat-bottomed pans, as a warped pan will not make full contact with the burner and will require more energy to heat.', 'Usar una sartén más pequeña que la hornilla puede desperdiciar hasta el 40% de la energía que produce la estufa.', 'Time-of-Day', 
NULL, NULL, 4, 2);

INSERT INTO TIPS VALUES(27, 'Use your oven efficiently. Opening the oven door causes your oven''s temperature to drop by about 25¬∞F. Instead of opening the door, check on your food by using the inside light and looking through the oven''s window.', NULL, NULL, 
NULL, NULL, 4, 2);

INSERT INTO TIPS VALUES(28, 'Use lids when cooking. Keeping lids on pots and pans helps trap heat and reduce cooking time, allowing you to use up to five times less energy when cooking on the stove.', NULL, NULL, 
NULL, NULL, 4, 2);

INSERT INTO TIPS VALUES(29, 'Cook in larger quantities and freeze leftovers. Making large batches of food at the same time is more energy efficient than making small meals, and the leftovers can be frozen to use as convenient meals later. Remember to let the food cool off before freezing it, as warm foods will make your freezer work harder and use more energy.', NULL, NULL, 
NULL, NULL, 4, 2);

INSERT INTO TIPS VALUES(30, 'Thaw foods in the fridge. Instead of using hot water or the microwave to defrost foods, have them thaw in the fridge overnight.', NULL, NULL, 
NULL, NULL, 4, 2);

INSERT INTO TIPS VALUES(31, 'Cook earlier in the day, if possible. In summer try to cook or bake in the early part of the day when it is the coolest and then reheat in the evening for dinner.', NULL, NULL, 
NULL, NULL, 4, 2);


INSERT INTO TIPS VALUES(32, 'In the summer months, set the thermostat to 78 degrees or higher. You''ll save around 5-10% on cooling costs for every two degrees you raise the temperature.', NULL, NULL, 
'https://smudenergystore.com/search?q=thermostat', NULL, 5, 11);

INSERT INTO TIPS VALUES(33, 'Use fans instead of central air conditioning whenever possible. A fan costs about 90% less to operate.', NULL, NULL, 
NULL, NULL, 5, 12);

INSERT INTO TIPS VALUES(34, 'Change the air filter regularly. A unit with dirty filters can use 5-10% more energy. You can improve energy efficiency and improve your indoor air quality by cleaning or replacing your filters every one to three months. You can find your filter in the return air register (may be on the wall or ceiling) or on the HVAC unit itself.

If you rent your home, ask your building management who is responsible for filter checking and replacement to be certain that filters are changed on a regular basis.', NULL, NULL, 
'https://smudenergystore.com/search?q=air%20filter', NULL, 5, 8);

INSERT INTO TIPS VALUES(35, 'In the fall, winter and spring, set the thermostat to 68 degrees or lower. Lower it to 55 degrees at night or when no one''s home.', NULL, NULL, 
'https://smudenergystore.com/thermostats-and-temperature/', NULL, 5, 11);

INSERT INTO TIPS VALUES(36, 'Keep vents open and air flowing. Closing doors and room vents puts extra strain on the central system.', NULL, NULL, 
NULL, NULL, 5, 8);

INSERT INTO TIPS VALUES(37, 'Use portable heaters only in rooms that don''t get enough heat, or if your home doesn''t have a central Heating system. Remember to turn them off when the room''s not in use.', NULL, NULL, 
NULL, NULL, 5, 7);

INSERT INTO TIPS VALUES(38, 'To help your air conditioning system work as efficiently as possible, carefully clean the exterior of the outdoor unit, or condenser. Remove dirt and debris, and clear any vegetation within two feet of the unit. Rinse off the unit by turning the system off and wash the unit''s exterior with a gentle stream from your hose in a downward direction.

For window units, keep furniture away from the unit and trim back tree branches or foliage from the outside part of the unit.', NULL, NULL, 
NULL, NULL, 5, 8);

INSERT INTO TIPS VALUES(39, 'Use a programmable thermostat to maintain your preferred temperature when you''re home and switch to an energy-saving mode when you''re away. Consider setting back temperatures 5-8 degrees when you''re away.

If you have a heat pump, consult a certified HVAC specialist before selecting a programmable thermostat or choosing a schedule. Heat pumps regulate temperature differently from gas furnaces, so heat pump owners should use different strategies to save energy.', NULL, NULL, 
NULL, NULL, 5, 11);


INSERT INTO TIPS VALUES(40, 'In summer, set your air conditioner Thermostat at 85 degrees or higher. In colder weather, set your heater to 60 degrees or lower.', NULL, NULL, 
NULL, NULL, 6, 2);

INSERT INTO TIPS VALUES(41, 'Put lights on a timer to save energy and give the house a "lived in" look.', NULL, NULL, 
NULL, NULL, 6, 2);

INSERT INTO TIPS VALUES(42, 'Draw the drapes on windows facing south and west.', NULL, NULL, 
NULL, NULL, 6, 2);

INSERT INTO TIPS VALUES(43, 'Check to make sure no faucets inside or out are dripping.', NULL, NULL, 
NULL, NULL, 6, 2);

INSERT INTO TIPS VALUES(44, 'If you plan to be away for three or more days, remember to turn the water heater''s thermostat down to the lowest setting or turn it completely off. When you''re back, reset it to 120F. This will help you save money each day you''re away, and even more during peak hours', 
'Si planea estar fuera de casa por tres días o más, recuerde bajar el termostato del calentador de agua al nivel más bajo o apagarlo por completo.', 'Fixed rate', 
NULL, NULL, 6, 2);

CREATE TABLE SEASON(
  S_ID INT NOT NULL PRIMARY KEY, 
  S_NAME VARCHAR (30)
);


INSERT INTO SEASON VALUES(1, 'All');
INSERT INTO SEASON VALUES(2, 'Spring');
INSERT INTO SEASON VALUES(3, 'Summer');
INSERT INTO SEASON VALUES(4, 'Fall');
INSERT INTO SEASON VALUES(5, 'Winter');

CREATE TABLE TIP_SEASON
(
 T_ID INT NOT NULL, 
 S_ID INT NOT NULL,
 PRIMARY KEY (T_ID, S_ID),
 FOREIGN KEY (T_ID) REFERENCES Tips(T_ID),
 FOREIGN KEY (S_ID) REFERENCES SEASON(S_ID)
 );

INSERT INTO TIP_SEASON VALUES(1,1);
INSERT INTO TIP_SEASON VALUES(2,1);
INSERT INTO TIP_SEASON VALUES(3,1);
INSERT INTO TIP_SEASON VALUES(4,1);
INSERT INTO TIP_SEASON VALUES(5,1);
INSERT INTO TIP_SEASON VALUES(6,1);
INSERT INTO TIP_SEASON VALUES(7,1);
INSERT INTO TIP_SEASON VALUES(8,1);

INSERT INTO TIP_SEASON VALUES(9,1);
INSERT INTO TIP_SEASON VALUES(10,1);
INSERT INTO TIP_SEASON VALUES(11,1);
INSERT INTO TIP_SEASON VALUES(12,1);
INSERT INTO TIP_SEASON VALUES(13,1);
INSERT INTO TIP_SEASON VALUES(14,1);

INSERT INTO TIP_SEASON VALUES(15,3);
INSERT INTO TIP_SEASON VALUES(16,1);
INSERT INTO TIP_SEASON VALUES(17,1);
INSERT INTO TIP_SEASON VALUES(18,1);
INSERT INTO TIP_SEASON VALUES(19,1);
INSERT INTO TIP_SEASON VALUES(20,1);
INSERT INTO TIP_SEASON VALUES(21,1);
INSERT INTO TIP_SEASON VALUES(22,1);
INSERT INTO TIP_SEASON VALUES(23,1);
INSERT INTO TIP_SEASON VALUES(24,3);

INSERT INTO TIP_SEASON VALUES(25,1);
INSERT INTO TIP_SEASON VALUES(26,1);
INSERT INTO TIP_SEASON VALUES(27,1);
INSERT INTO TIP_SEASON VALUES(28,1);
INSERT INTO TIP_SEASON VALUES(29,1);
INSERT INTO TIP_SEASON VALUES(30,1);
INSERT INTO TIP_SEASON VALUES(31,1);

INSERT INTO TIP_SEASON VALUES(32,3);
INSERT INTO TIP_SEASON VALUES(33,3);
INSERT INTO TIP_SEASON VALUES(34,3);
INSERT INTO TIP_SEASON VALUES(35,4);
INSERT INTO TIP_SEASON VALUES(35,5);
INSERT INTO TIP_SEASON VALUES(36,4);
INSERT INTO TIP_SEASON VALUES(36,5);
INSERT INTO TIP_SEASON VALUES(37,4);
INSERT INTO TIP_SEASON VALUES(37,5);
INSERT INTO TIP_SEASON VALUES(38,2);
INSERT INTO TIP_SEASON VALUES(38,3);
INSERT INTO TIP_SEASON VALUES(39,1);

INSERT INTO TIP_SEASON VALUES(40,1);
INSERT INTO TIP_SEASON VALUES(41,1);
INSERT INTO TIP_SEASON VALUES(42,1);
INSERT INTO TIP_SEASON VALUES(43,1);
INSERT INTO TIP_SEASON VALUES(44,1);


CREATE TABLE TIP_FEEDBACK
(
  T_ID INT NOT NULL,
  TIP_LIKES BIGINT NOT NULL,
  TIP_DISLIKES BIGINT NOT NULL,
  PRIMARY KEY(T_ID),
  FOREIGN KEY(T_ID) REFERENCES TIPS(T_ID)
);

-- While loop to populate table
DECLARE @i INT = 1;
DECLARE @max INT = 44;

WHILE @i <= @max
BEGIN
   INSERT INTO TIP_FEEDBACK (T_ID, TIP_LIKES, TIP_DISLIKES)
   VALUES (@i, 0, 0);
   
   SET @i = @i + 1;
END


CREATE TABLE TIP_COMMENT
(
  T_ID INT NOT NULL,
  COMMENT_SEQ INT,            -- Sequence number that uniquely identifies each comment within a particular tip
  COMMENT VARCHAR(MAX),
  TIP_DATE DATE,
  PRIMARY KEY(T_ID),
  UNIQUE (T_ID, COMMENT_SEQ),
  FOREIGN KEY(T_ID) REFERENCES TIPS(T_ID)
);

-- While loop to populate table
DECLARE @i INT = 1;
DECLARE @max INT = 44;

WHILE @i <= @max
BEGIN
   INSERT INTO TIP_COMMENT (T_ID, TIP_DATE)
   VALUES (@i, NULL);
   
   SET @i = @i + 1;
END


