from rasa.shared.nlu.training_data.loading import load_data
from textblob import TextBlob
import csv
import yaml
import os


def analyze_sentiment(text):
    blob = TextBlob(text)
    sentiment = blob.sentiment.polarity
    return sentiment


# Get the path to the nlu.yml file
current_directory = os.path.join(os.getcwd(), "public", "CHATBOT", "data")
nlu_file = os.path.join(current_directory, "nlu.yml")

# Load the NLU data from the YAML file
nlu_data = load_data(nlu_file)

# Access the training examples
training_examples = nlu_data.training_examples

# Analyze sentiment and save results to a CSV file
# output_file = "sentiment_analysis_done.csv"
# with open(output_file, "w", newline="", encoding="utf-8") as file:
#     writer = csv.writer(file)
#     writer.writerow(["Text", "Sentiment"])
#     for example in training_examples:
#         text = example.data.get("text")
#         sentiment = analyze_sentiment(text)
#         writer.writerow([text, sentiment])

# print(f"Sentiment analysis results saved to {output_file}.")


# this is for the yml output file
# Analyze sentiment and update the training examples
for example in training_examples:
    text = example.data.get("text")
    sentiment = analyze_sentiment(text)
    example.data["sentiment"] = sentiment

# Save the updated NLU data to a new nlu.yml file
output_file = "../actions/sentiment_analysis.yml"
output_path = os.path.join(current_directory, output_file)

with open(output_path, "w", encoding="utf-8") as file:
    yaml.dump(nlu_data, file)

print(f"Sentiment analysis results saved to {output_file}.")
