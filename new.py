import requests
import csv
import time

app_id = "478abde6"
api_key = "5f61925208e3cdff7aa6f983bc6df5b7"

vacatures = []

for page in range(1, 21):
    url = f"https://api.adzuna.com/v1/api/jobs/nl/search/{page}"
    params = {
        "app_id": app_id,
        "app_key": api_key,
        "results_per_page": 50,
        "content-type": "application/json"
    }

    response = requests.get(url, params=params)
    if response.status_code != 200:
        print(f"Fout bij pagina {page}: {response.status_code}")
        continue

    data = response.json()
    if "results" in data:
        vacatures.extend(data["results"])
    else:
        print(f"Geen 'results' op pagina {page}")

    time.sleep(1)

with open("vacatures.csv", "w", newline="", encoding="utf-8") as f:
    writer = csv.writer(f)
    writer.writerow(["title", "company", "location", "category", "salary_min", "salary_max", "created"])
    
    for vacature in vacatures:
        writer.writerow([
            vacature.get("title"),
            vacature.get("company", {}).get("display_name"),
            vacature.get("location", {}).get("display_name"),
            vacature.get("category", {}).get("label"),
            vacature.get("salary_min"),
            vacature.get("salary_max"),
            vacature.get("created")
        ])

print(f"{len(vacatures)} vacatures opgeslagen in vacatures.csv") 
