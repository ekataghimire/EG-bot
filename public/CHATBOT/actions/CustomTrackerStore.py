from rasa.core.tracker_store import TrackerStore
from rasa.core.tracker_store import DialogueStateTracker
from rasa.shared.core.domain import Domain
from typing import Text, Dict, Any, Optional


class CustomTrackerStore(TrackerStore):

    def __init__(self, domain: Domain) -> None:
        super().__init__(domain)
        # Initialize your database connection here

    def create_or_get_tracker(self, session_id: Text, user_id: Optional[Text] = None) -> DialogueStateTracker:
        # Use the session_id as the sender_id
        sender_id = str(user_id)

        # Check if tracker already exists
        tracker = self.retrieve(sender_id)
        if tracker is not None:
            return tracker

        # If tracker does not exist, create a new one
        domain = self.retrieve_domain()
        if domain is None:
            raise Exception("Could not retrieve domain from database")

        tracker = DialogueStateTracker(sender_id, domain.slots)
        self.save(tracker)
        return tracker
