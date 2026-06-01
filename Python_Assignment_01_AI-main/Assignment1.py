#!/usr/bin/env python
# coding: utf-8

# In[1]:


# 1. Print Welcome Message
print("Welcome to Assignment-1")


# In[2]:


# 2. Add Two Numbers

Num1 = 10
Num2 = 30

Add = Num1 + Num2

print("Num1 =", Num1)
print("Num2 =", Num2)
print("Add =", Add)


# In[5]:


# 3. Body Mass Index (BMI)

# Take input from user
bmi = float(input("Enter the BMI Index: "))

# Check BMI category
if (bmi < 18.5):
    print("Underweight")
elif (18.5 <= bmi < 25):
    print("Normal weight")
elif (25 <= bmi < 30):
    print("Overweight")
else:
    print("Very Overweight")


# In[6]:


# 3. Body Mass Index (BMI)

# Take input from user
bmi = float(input("Enter the BMI Index: "))

# Check BMI category
if bmi < 18.5:
    print("Underweight")
elif 18.5 <= bmi < 25:
    print("Normal weight")
elif 25 <= bmi < 30:
    print("Overweight")
else:
    print("Very Overweight")


# In[ ]:




