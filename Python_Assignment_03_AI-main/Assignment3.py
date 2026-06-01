#!/usr/bin/env python
# coding: utf-8

# In[1]:


# print 0 to 20 by using range

for i in range(0, 20):
    print(i)


# In[3]:


# print range 10 to 20

for i in range(10, 20):
    print(i, end=" ")


# In[4]:


# print number of items in the list by using 'len'

my_list = [10, 20, 14, 55, 43, 87, 76]

print(my_list)
print("Number of item in the List:", len(my_list))


# In[8]:


# Print each character vertically

text = "Artificial Intelligence"
print(text)

for letter in text:
    print(letter)


# In[11]:


name = input("Enter your name: ")
age = input("Enter your age: ")
profession = input("Enter your profession: ")


# In[12]:


print("-Your Name-")
print("-Your Age-")
print("-Your Profession-")


# In[13]:


# Print this mixed datatype using Tuple

my_tuple = (1, "Welcome", 2, "mars tech")

print(my_tuple)


# In[14]:


Tuple1 = (0, 1, 2, 3)
Tuple2 = ("python", "mars tech")

result = (Tuple1, Tuple2)
print(result)


# In[15]:


numbers = (20, 10, 16, 19, 25, 1, 276, 188)

for num in numbers:
    if num % 2 != 0:
        print(num, "is odd")


# In[19]:


numbers = (20, 10, 16, 19, 25, 1, 276, 188)
print(numbers)

for num in numbers:
    if num % 2 != 0:
        print(num, "is odd")


# In[20]:


numbers = (20, 10, 16, 19, 25, 1, 276, 188)

for num in numbers:
    if num % 2 == 0:
        print(num, "is even")


# In[ ]:




