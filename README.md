# Data serialisation

1. Write a program that converts the php data structure shown below into the serialised xml beneath it:

    a) Used Test Driven Approch

    b) Can be tested by :

       i) running phpunit on command line

       ii) php index.php on the termial



2. Explain how you would extend your code to optionally convert the data structure to json instead (no
need to actually write the code if you don’t have time).

    In order to extend conversion of the data serialisaton into Json, I would:

    a) Create a Interface with a method (say convert())

    b) Create a seperate class for XML Serialisation and Json Serialisation that would implement this interface

    c) Create a seperate ArrayToJson or XMLToJson that would be responsible for actual conversion, just like ArrayToXML I have created.

    d) During the runtime call the interface and the method.


3. What additional work might you do in order to make your code production­ ready?

    Assuming the input data is comming from the making an api request. I would:

    a) Validate the input data.

    b) While parsing the input data, additional validation need to be done.

    c) Error Handling and Error Reporting. Excepting class do deal with any error and gracefully handle any errors.

    d) Conside using PHP DOMDocument class for creating and parsing XML, as it is tried and tested approach.
