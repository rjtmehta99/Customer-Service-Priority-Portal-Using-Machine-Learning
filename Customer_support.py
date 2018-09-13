import pandas as pd
import matplotlib.pyplot as plt

df = pd.read_excel("Book_data.xlsx")
# df

id = int(input("Enter user_id : "))

# id = 3
sum_search = sum(df.iloc[id-1, 1:6])
battery = df.iloc[id-1, 1]
heating = df.iloc[id-1, 2]
display = df.iloc[id-1, 3]
speaker = df.iloc[id-1, 4]
keyboard = df.iloc[id-1, 5]
# sum_search

labels = ('Battery', 'Heating', 'Display','Speaker', 'Keyboard')
colors = ['red', 'aqua', 'orange', 'pink', 'yellow']
sizes = [battery, heating, display, speaker, keyboard]
plt.title("Customer category-wise searches")

L = [1,2,3,4,5]
plt.bar(L, sizes, color=['orange', 'red', 'green', 'blue', 'cyan'])
plt.xticks(L, labels)
plt.savefig(str("searches_bar")+'.png', bbox_inches='tight' , transparent = True)