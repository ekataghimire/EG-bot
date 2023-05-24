from typing import Any, Text, Dict, List
from utils.jokes import get_jokes
from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher


class ActionUtterSympathy(Action):
    def name(self) -> Text:
        return "action_utter_sympathy"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        dispatcher.utter_message(
            "I'm sorry to hear that. It must be really difficult to deal with depression symptoms. Please know that I'm here to support you in any way I can.")
        return []


class ActionUtterRecommendHelp(Action):
    def name(self) -> Text:
        return "action_utter_recommend_help"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        dispatcher.utter_message("It's important to prioritize your mental health. I would recommend seeking professional help from a mental health professional. You can also check out online resources like the National Alliance on Mental Illness (NAMI) or the Substance Abuse and Mental Health Services Administration (SAMHSA).")
        return []


class ActionUtterAcknowledgeSuicidal(Action):
    def name(self) -> Text:
        return "action_utter_acknowledge_suicidal"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        dispatcher.utter_message(
            "There is always a way out. Sucicide is not an option. Suicide hotline: 9876908765")
        return []


class ActionUtterConnect_Crisis_Hotline(Action):
    def name(self) -> Text:
        return "action_utter_connect_crisis_hotline"

    def run(self, dispatcher: CollectingDispatcher, tracker: Tracker, domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:
        dispatcher.utter_message(
            "Start living life for yourself not others. YOU are the most important person to you. Self love is the biggest love. Suicide Prevention Hotline: 982373736372")
        return []


class ActionGetJoke(Action):
    def name(self):
        return "action_get_joke"

    def run(self, dispatcher, tracker, domain):
        joke = get_jokes()
        dispatcher.utter_message(f"{joke}")
