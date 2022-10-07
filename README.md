# Introduction
This Php exercise contains a Php project that can be opened with Visual Studio Code, or any other text editor. There is a single file in the test, called Sprocket.php which contains the structure of the excercise. The functionality that is being asked needs to be written in the function Get of the class SprocketCache. The tests proving that the functionality works as expected should be written below the class, after the command:
‘echo "Initialized. Add tests showcasing cache behaviour below.";’
No particular unit testing framework is being used to make the test as generic as possible. The exercise consists of two pieces of functionality being requested below.
# Functionality expected from the SprocketCache class
##Part 1 – Initial requirements
### Background
In our software we have a method that creates instances of a class called Sprocket. The creation of the instance [supposedly] requires some difficult calculations so there is a need to cache the Sprocket instances and this caching is done using an alphanumeric key. 
### Requirements
•	When a key is provided to the class and the key has not been provided to the cache before, i.e. it’s the first time, the SprocketCache.Get method must return a newly created Sprocket instance (created by the SprocketFactory that is being injected into the constructor)
•	When a key is provided to the SprocketCache.Get method and the key has been provided to the class previously, the method must return the same Sprocket instance (object) as the one that was returned in the previous call.
•	When different keys are provided to the SprocketCache.Get method, different instances of the Sprocket class must be returned.
## Part 2 – Extended requirements
### Background
The new version of our software requires that the Sprocket instances are not cached forever, but rather expire after a specific amount of time, which is to be defined during the construction of the cache.
### Requirements
•	When creating the instance of the SprocketCache, the caller would have to define an expiry period.
•	If the elapsed time between a Sprocket instance creation (during a call to the Get method) and a subsequent call to the Get method (with the same key of course) is more than the expiry period defined, then a new instance of the Sprocket class must be returned.
•	If the elapsed time between a Sprocket instance creation (during a call to the Get method) and a subsequent call to the Get method (with the same key of course) is less than the expiry period defined, then the same instance must be returned in both cases. 
# Suggestion
It is suggested that the requirements are addressed in sequence as they are provided because they are of increasing complexity and the test can be successful without having addressed all of the requirements.