# Data serialisation

1. Write a program that converts the php data structure shown below into the serialised xml beneath it:

 -> Used Test Driven Approch
 -> Can be tested by :
    -> running phpunit on command line
    -> also check the formatted output by running : php index.php on the termial


2. Explain how you would extend your code to optionally convert the data structure to json instead (no
need to actually write the code if you don’t have time).

In order to extend to convert the data serialisaton to Json, I would:

 a) Create a Interface with a method (say convert())
 b) Create a seperate class for XML Serialisation and Json Serialisation that would implement this interface
 c) Create a seperate ArrayToJson or XMLToJson that would be responsible for actual conversion, just like ArrayToXML I have created (Single Responsibility).
 d) During the runtime call the interface and the method, making it dynamic.

 3. What additional work might you do in order to make your code production­ ready?

    Assuming the input data is comming from the making an api request. I would:

 a) Validate the input data.
 b) While parsing the input data, additional validation need to be done.
 c) Error Handling and Error Reporting. Excepting class do deal with any error and gracefully handle the error.
