#!/usr/bin/env python
# coding: utf-8

# In[7]:


value = 10
print("Value:",value)

if value == 10:
    print("Correct")


# In[5]:


value =int (input("Value :"))

if value == 10:
    print("Correct")


# In[8]:


correct_password = "marstech@123"
password = input("Enter the password: ")

if password == correct_password:
    print("Your password is correct")
else:
    print("Wrong password")


# In[10]:


age = int(input("Age: "))

if age < 13:
    print("Child")
elif age < 18:
    print("Teen")
elif age < 60:
    print("Adult")
else:
    print("Senior Citizen")


# In[12]:


num = int(input("Enter any number: "))

if num > 0:
    print("No is positive")
elif num < 0:
    print("No is negative")
else:
    print("Number is zero")


# In[13]:


num = int(input("Enter a number to check: "))

if num % 5 == 0:
    print("No is divisible by 5")
else:
    print("No is not divisible by 5")


# In[ ]:




