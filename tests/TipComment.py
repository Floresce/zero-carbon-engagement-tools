# Test 04: Interact with tip comment modal

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

# Click on the comment link for the first tip
time.sleep(3)
link_element = driver.find_element(By.ID, "openCommentModal-1")
link_element.click()

# Locate the text input field
time.sleep(2)
text_field = driver.find_element(By.ID, "comment-1")

# Type some text into the field
time.sleep(1)
text_field.send_keys("Hello, world!")

# Submit the comment
#time.sleep(2)
#submit_button = driver.find_element(By.ID, "commentBtn-1")
#submit_button.click()

# Close the webdriver
time.sleep(2)
driver.quit()