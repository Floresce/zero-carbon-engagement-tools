# Test 03: Interact with thumbs up and down elements

# Import modules for web scripting using Selenium
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import Select
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.chrome.service import Service
import time

# Set up the webdriver using webdriver_manager
driver_service = Service(ChromeDriverManager().install())
driver = webdriver.Chrome(service=driver_service)
driver.set_window_size(1280, 900)

# Open the webpage
driver.get('https://programmedelic.azurewebsites.net/')

# Click on the thumbs up button for the first tip
time.sleep(2)
like_button = driver.find_element(By.ID, "likeBtn-1")
like_button.click()

# Scroll to the next tip containing thumbs up/down buttons
time.sleep(1)
driver.execute_script("arguments[0].scrollIntoView();", like_button)

# Click on the thumbs down button for the second tip
time.sleep(2)
dislike_button = driver.find_element(By.ID, "dislikeBtn-2")
dislike_button.click()

# Close the webdriver
time.sleep(2)
driver.quit()