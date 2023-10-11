<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" href="bodystyles.css">
            <title>Home</title>
        </head>
        <body>
            <?php include('header.php'); ?>
                <div class="subject">
                    <h2>Purpose</h2>
                    <div class="paragraph_wrapper">
                        <p class="paragraph_body">
                            There are many phases in the creative writing process. A lot of these creative challenges can be solved with proper organization and visualization of concepts. The purpose of Object-Oriented Writing is to apply the concepts of object-oriented programming to creative writing organization. This will allow authors to organize characters, locations, story arcs, and more  by relating them to one another in a parent-child-sibling relationship. Authors can store metadata, relational data, and more about different writing concepts, or objects, to better help motivate the creative writing process.
                        </p>                   
                    </div>
                </div>
                <div class="column-view">
                    <div class="subject">
                        <h2>What is Object-Oriented Programming?</h2>
                        <div class="paragraph_wrapper">
                            <p class="paragraph_body">
                                Object-oriented programming (OOP) is a powerful programming paradigm that is based on the concept of "Objects". OOP provides a way to structure and design software by modeling real-world entities and interactions. A couple of programming languages that are Object-oriented include C#, Java, and Python!
                                Here are some key concepts in Object-oriented Programming:
                            </p>
                            <hr/>
                            <ol>
                                <li class="li-wrapper-compact">
                                    <p><span class="subject">Objects:</span> Objects are the fundamental building blocks of OOP. An object is an instance of a class, which is a blueprint or template for creating objects. These objects can represent real-world entities or abstract concepts.</p>
                                </li>
                                <li class="li-wrapper-compact">
                                    <p><span class="subject">Classes:</span> lasses are used to define the structure and behavior of objects. They encapsulate data (attributes or properties) and methods (functions or procedures) that operate on that data. A class serves as a blueprint for creating objects, specifying what data they will contain and what actions they can perform.</p>
                                </li>
                                <li class="li-wrapper-compact">
                                    <p><span class="subject">Encapsulation:</span> Encapsulation is the practice of bundling data (attributes) and the methods that operate on that data into a single unit (i.e., a class). It allows you to hide the internal implementation details of a class and expose a well-defined interface for interacting with objects. This helps in maintaining and modifying code without affecting other parts of the program.</p>
                                </li>
                                <li class="li-wrapper-compact">
                                    <p><span class="subject">Inheritance:</span> Inheritance is a mechanism that allows one class (the subclass or derived class) to inherit the properties and behaviors of another class (the superclass or base class). This promotes code reuse and allows for creating specialized classes based on more general ones.</p>
                                </li>
                                <li class="li-wrapper-compact">
                                    <p><span class="subject">Polymorphism:</span> Polymorphism allows objects of different classes to be treated as objects of a common superclass. It enables you to write code that can work with objects from multiple classes in a uniform way. Polymorphism can be achieved through method overriding and method overloading.</p>
                                </li>
                                <li class="li-wrapper-compact">
                                <p><span class="subject">Data Abstraction:</span> Abstraction is the process of simplifying complex reality by modeling classes based on the essential properties and behaviors. It allows you to focus on what an object does rather than how it does it. Abstraction also helps in managing the complexity of large software systems</p>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="subject">
                        <h2>How Can OOP be Applied to Writing?</h2>
                        <div class="paragraph_wrapper">
                            <p class="paragraph_body">
                                There are only a couple of the OOP concepts that we will adopt in a more simplistic form in order to apply this organizational structure to writing:
                            </p>
                            <hr/>
                            <ol>
                                <li class="li-wrapper-spread">
                                    <p><span class="subject">Objects:</span> Objects are what it's all about! You will create objects to represent different 'classes' of writing concepts.</p>
                                    <a href="about.php" class="learn_more">🢖 Learn more about Objects</a>
                                </li>
                                <li class="li-wrapper-spread">
                                    <p><span class="subject">Classes:</span> In Object-oriented writing, classes will represent classifications of types of objects. An example of a 'writing class' would be a character, or a place.</p>
                                    <a href="about.php" class="learn_more">🢖 Learn more about Classes</a>
                                </li>
                                <li class="li-wrapper-spread">
                                    <p><span class="subject">Inheritance:</span> Inheritance will be the main form of object relation. Objects can be related in a similar fasion that a family is related to one another.</p>
                                    <a href="about.php" class="learn_more">🢖 Learn more about Inheritance</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="subject">
                    <h2>Get Started</h2>
                    <div class="paragraph_wrapper">
                        <p class="paragraph_body">If you are already familiar with how Object-oriented programming works, then perhaps you're ready to jump right in to the <a href="editor.php">Editor</a></p>
                        <p class="paragraph_body">Otherwise, it is reccomended that you dive further into how these concepts will be used in the <a href="about.php">About</a> page.</p>

                        <p>But Wait! First <a href="login.php">Sign Up</a> for a Free Account in order to save and manage your objects.</p>
                    </div>
                <div>
        </body>
        <?php include('footer.php'); ?>
    </html>