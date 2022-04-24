import sys

def get_recommendations_quantity(user_pax, meal_num, product_id):
    recommend_df = grocerylist_df[
        (grocerylist_df.user_pax == user_pax)
        &(grocerylist_df.meal_num == meal_num)
        &(grocerylist_df.product_id == product_id)
    ]
    return recommend_df['quantity'].value_counts().idxmax()

# make sure the code start from here
if __name__ == "__main__":
    user_pax = sys.argv[1]
    meal_num = sys.argv[2]
    product_id = sys.argv[3]

    # temporary just put this logic first :(
    print(user_pax)


# import requests
# import sys
# from pandas import json_normalize
# url = 'http://127.0.0.1:8000/api/grocerylistproducts'
# response = requests.get(url)
# json = response.json()
# [{'id': 1, 'grocerylist_id': 1, 'product_id': 1, 'quantity': 2, 'created_at': None, 'updated_at': None, 'user_id': 1, 'user_pax': 2, 'meal_num': 2}]
# grocerylist_df = json_normalize(json)
# grocerylist_df.drop(['created_at', 'updated_at'],axis='columns',inplace=True)
# grocerylist_df = grocerylist_df.fillna(0)
# def get_recommendations_quantity(user_pax, meal_num, product_id):
#     recommend_df = grocerylist_df[(grocerylist_df.user_pax == user_pax)&(grocerylist_df.meal_num == meal_num)&(grocerylist_df.product_id == product_id)]
#     recommend_quantity = recommend_df['quantity'].value_counts().idxmax()
#     return(recommend_quantity)

# get_recommendations_quantity(sys.argv[1],sys.argv[2],sys.argv[3])

