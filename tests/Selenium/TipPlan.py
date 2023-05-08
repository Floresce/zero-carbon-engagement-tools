# Test 05: Interact with the add tip to plan feature

# Import modules for web scripting using Selenium
from selenium import webdriver
from selenium.webdriver.common.by import By
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
import time

# Set up the webdriver using webdriver_manager
driver_service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=driver_service)
driver.set_window_size(1280, 900)

# Open the webpage
driver.get('http://localhost/zero-carbon-engagement-tools/index.html')

# Click on the add to plan button for the first tip
time.sleep(2)
addtoplan_button = driver.find_element(By.ID, "atpBtn-1")
addtoplan_button.click()

# Scroll to the next tip containing an add to plan button
time.sleep(1)
driver.execute_script("arguments[0].scrollIntoView();", addtoplan_button)

# Click on the add to plan button for the second tip
time.sleep(2)
addtoplan_button_2 = driver.find_element(By.ID, "atpBtn-2")
addtoplan_button_2.click()

# Close the webdriver
time.sleep(2)
driver.quit()