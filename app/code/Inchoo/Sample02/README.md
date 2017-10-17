## Sample 02 - DI && Object Manager

* Dependency injection
* Object Manager (Magento DI Container)
* di.xml

# Todo
* Set default class for DummyInterface from di.xml
* Create virtual type Dummy3 and set it as DummyInterface default
* Find auto-generated DummyFactory and examine its code
* Create new class Sample02\Model\B that depends of Sample02\Model\A and load B from controller. 
    * Now load B Factory, create and var_dump B
    * Create class C and change B->C from di.xml
