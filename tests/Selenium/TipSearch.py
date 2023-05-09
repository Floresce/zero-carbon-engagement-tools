# Test 06: Interact with the search feature

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
driver.get('https://programmedelic.azurewebsites.net/')

# Input text into the search box
time.sleep(2)
search_box = driver.find_element(By.ID, "search-box")
search_box.send_keys("water")

# Click on the search button
time.sleep(2)
search_button = driver.find_element(By.XPATH, "//button[@onclick='submitForm();']")
search_button.click()

# Close the webdriver
time.sleep(2)
driver.quit()