# Test 01: Navigate the header contents of the webpage

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

# Find the link element
time.sleep(2)
link_element = driver.find_element(By.XPATH, '//a[@href="https://www.smud.org/"]')
link_element.click()

# Return back to the webpage
time.sleep(2)
driver.get('https://programmedelic.azurewebsites.net/')

# Toggle the Dashboard button
time.sleep(2)
dashboard_btn = driver.find_element(By.XPATH, '//a[@href="dashboard/"]')
dashboard_btn.click()

# Return back to the webpage
time.sleep(2)
driver.get('https://programmedelic.azurewebsites.net/')

# Toggle the Tips Plan button
time.sleep(2)
tipsplan_btn = driver.find_element(By.ID, 'planBtn')
tipsplan_btn.click()

# Close the webdriver
time.sleep(2)
driver.quit()
