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
driver.set_window_size(1280, 720)

# Open the webpage
driver.get('https://programmedelic.azurewebsites.net/')

# Find the link element
time.sleep(2)
link_element = driver.find_element(By.XPATH, '//a[@href="https://www.smud.org/"]')
link_element.click()

# Return back to the webpage
time.sleep(2)
driver.get('https://programmedelic.azurewebsites.net/')

# Toggle the Menu option
time.sleep(2)
menu_toggle = driver.find_element(By.ID, 'navbarDropdown')
menu_toggle.click()

# Click on the 'Dashboard' link
time.sleep(2)
dashboard_link = driver.find_element(By.LINK_TEXT, 'Dashboard')
dashboard_link.click()

# Return back to the webpage
time.sleep(2)
driver.get('hhttps://programmedelic.azurewebsites.net/')

# Toggle the Menu option
time.sleep(2)
menu_toggle = driver.find_element(By.ID, 'navbarDropdown')
menu_toggle.click()

# Click on the 'Tips Plan' button
time.sleep(2)
tips_plan_btn = driver.find_element(By.ID, 'planBtn')
tips_plan_btn.click()

# Close the webdriver
time.sleep(2)
driver.quit()
