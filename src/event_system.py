class Event:
    def __init__(self, data):
        self.data = data

class EventSystem:
    def __init__(self):
        self.handlers = {}

    def subscribe(self, event_name, handler):
        if event_name not in self.handlers:
            self.handlers[event_name] = []
        self.handlers[event_name].append(handler)

    def unsubscribe(self, event_name, handler):
        if event_name in self.handlers:
            self.handlers[event_name].remove(handler)

    def dispatch(self, event_name, event):
        if event_name in self.handlers:
            for handler in self.handlers[event_name]:
                handler(event)

# Example usage
def on_event(event):
    print("Event received:", event.data)

event_system = EventSystem()
event_system.subscribe("example_event", on_event)

# Dispatch an event
event = Event({"message": "Hello, World!"})
event_system.dispatch("example_event", event) 