## Arrays - DS
Problem Link: https://hackerrank.com/challenges/arrays-ds/problem

```php
<?php
function reverseArray($a) {
    $n = count($a);
    for($i=0; $i<$n/2; $i++){
        // swap(i, n-i-1)
        $x = $a[$i];
        $a[$i] = $a[$n-$i-1];
        $a[$n-$i-1] = $x;
    }
    foreach($a as $b){
        echo $b . "\n";
    }
    return $a;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr_count = intval(trim(fgets(STDIN)));

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$res = reverseArray($arr);

fwrite($fptr, implode(" ", $res) . "\n");

fclose($fptr);
```

## 2D Array - DS
Problem Link: https://hackerrank.com/challenges/2d-array/problem

```php
<?php
function hourglassSum($arr) {
    $sum = -1000000;
    $n = count($arr);
    for($i=0; $i<$n-2; $i++){
        for($j=0; $j<$n-2; $j++){
            $curr = $arr[$i][$j]  +$arr[$i][$j+1]  +$arr[$i][$j+2]
                                  +$arr[$i+1][$j+1]+
                    $arr[$i+2][$j]+$arr[$i+2][$j+1]+$arr[$i+2][$j+2];
            $sum = max($sum, $curr);
            echo $sum . " || ";
        }
    }
    echo "max = " . $sum;
    return $sum;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$arr = array();

for ($i = 0; $i < 6; $i++) {
    $arr_temp = rtrim(fgets(STDIN));

    $arr[] = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = hourglassSum($arr);

fwrite($fptr, $result . "\n");

fclose($fptr);
```

## Dynamic Array
Problem Link: https://hackerrank.com/challenges/dynamic-array/problem

```php
<?php
function dynamicArray($n, $queries) {
    $LA = 0;
    $arr = array_fill(0, $n, array());
    $ans = array(); 
    for($i=0; $i<count($queries) ; $i++){
        $T = $queries[$i][0];
        $x = $queries[$i][1];
        $y = $queries[$i][2]; 
        $ind = (($x^$LA)%$n);
        if($T==1){
            $arr[$ind][] = $y;
        }else{
            $LA = $arr[$ind][$y%count($arr[$ind])];
            $ans[] = $LA;    
        }
    }
    return $ans;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$q = intval($first_multiple_input[1]);

$queries = array();

for ($i = 0; $i < $q; $i++) {
    $queries_temp = rtrim(fgets(STDIN));

    $queries[] = array_map('intval', preg_split('/ /', $queries_temp, -1, PREG_SPLIT_NO_EMPTY));
}

$result = dynamicArray($n, $queries);

fwrite($fptr, implode("\n", $result) . "\n");

fclose($fptr);
```

## Left Rotation
Problem Link: https://hackerrank.com/challenges/array-left-rotation/problem

```php
<?php
function rotateLeft($d, $arr) {
    $arr2 = array();
    for ($k = $d; $k < count($arr); $k++) {
        $arr2[] = $arr[$k];
    }
    for ($i = 0; $i < $d; $i++) {
        $arr2[] = $arr[$i];
    }
    return $arr2;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");

$first_multiple_input = explode(' ', rtrim(fgets(STDIN)));

$n = intval($first_multiple_input[0]);

$d = intval($first_multiple_input[1]);

$arr_temp = rtrim(fgets(STDIN));

$arr = array_map('intval', preg_split('/ /', $arr_temp, -1, PREG_SPLIT_NO_EMPTY));

$result = rotateLeft($d, $arr);

fwrite($fptr, implode(" ", $result) . "\n");

fclose($fptr);
```

## Print the Elements of a Linked List
Problem Link: https://hackerrank.com/challenges/print-the-elements-of-a-linked-list/problem

```python
#!/bin/python3

import math
import os
import random
import re
import sys

class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

    def insert_node(self, node_data):
        node = SinglyLinkedListNode(node_data)

        if not self.head:
            self.head = node
        else:
            self.tail.next = node


        self.tail = node

def printLinkedList(head):
    temp = head
    while temp:
        print(temp.data)
        temp = temp.next
    

if __name__ == '__main__':
    llist_count = int(input())

    llist = SinglyLinkedList()

    for _ in range(llist_count):
        llist_item = int(input())
        llist.insert_node(llist_item)

    printLinkedList(llist.head)
```

## Insert a Node at the Tail of a Linked List
Problem Link: https://hackerrank.com/challenges/insert-a-node-at-the-tail-of-a-linked-list/problem

```python
#!/bin/python3

import math
import os
import random
import re
import sys

class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None

def print_singly_linked_list(node, sep, fptr):
    while node:
        fptr.write(str(node.data))

        node = node.next

        if node:
            fptr.write(sep)
def insertNodeAtTail(head, data):
    temp = SinglyLinkedListNode(data)
    if head is None:
        head = temp
        return head
    curr = head
    while curr.next:
        curr = curr.next
    curr.next = temp
    return head

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    llist_count = int(input())

    llist = SinglyLinkedList()

    for i in range(llist_count):
        llist_item = int(input())
        llist_head = insertNodeAtTail(llist.head, llist_item)
        llist.head = llist_head

    print_singly_linked_list(llist.head, '\n', fptr)
    fptr.write('\n')

    fptr.close()
```

## Insert a node at the head of a linked list
Problem Link: https://hackerrank.com/challenges/insert-a-node-at-the-head-of-a-linked-list/problem

```python
#!/bin/python3

import math
import os
import random
import re
import sys

class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

def print_singly_linked_list(node, sep, fptr):
    while node:
        fptr.write(str(node.data))

        node = node.next

        if node:
            fptr.write(sep)
def insertNodeAtHead(llist, data):
    temp = SinglyLinkedListNode(data)
    if llist is None:
        llist = temp
    else:
        temp.next = llist
        llist = temp
    return llist

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    llist_count = int(input())

    llist = SinglyLinkedList()

    for _ in range(llist_count):
        llist_item = int(input())
        llist_head = insertNodeAtHead(llist.head, llist_item)
        llist.head = llist_head
    
    print_singly_linked_list(llist.head, '\n', fptr)
    fptr.write('\n')
    
    fptr.close()
```

## Insert a node at a specific position in a linked list
Problem Link: https://hackerrank.com/challenges/insert-a-node-at-a-specific-position-in-a-linked-list/problem

```python
#!/bin/python3

import math
import os
import random
import re
import sys

class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

    def insert_node(self, node_data):
        node = SinglyLinkedListNode(node_data)

        if not self.head:
            self.head = node
        else:
            self.tail.next = node


        self.tail = node

def print_singly_linked_list(node, sep, fptr):
    while node:
        fptr.write(str(node.data))

        node = node.next

        if node:
            fptr.write(sep)
def insertNodeAtPosition(llist, data, position):
    temp = SinglyLinkedListNode(data)
    curr = llist
    while position>1:
        position -= 1
        curr = curr.next
    temp.next = curr.next
    curr.next = temp
    return llist

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    llist_count = int(input())

    llist = SinglyLinkedList()

    for _ in range(llist_count):
        llist_item = int(input())
        llist.insert_node(llist_item)

    data = int(input())

    position = int(input())

    llist_head = insertNodeAtPosition(llist.head, data, position)

    print_singly_linked_list(llist_head, ' ', fptr)
    fptr.write('\n')

    fptr.close()
```

## Delete a Node
Problem Link: https://hackerrank.com/challenges/delete-a-node-from-a-linked-list/problem
```python
#!/bin/python3

import math
import os
import random
import re
import sys

class SinglyLinkedListNode:
    def __init__(self, node_data):
        self.data = node_data
        self.next = None

class SinglyLinkedList:
    def __init__(self):
        self.head = None
        self.tail = None

    def insert_node(self, node_data):
        node = SinglyLinkedListNode(node_data)

        if not self.head:
            self.head = node
        else:
            self.tail.next = node


        self.tail = node

def print_singly_linked_list(node, sep, fptr):
    while node:
        fptr.write(str(node.data))

        node = node.next

        if node:
            fptr.write(sep)
def deleteNode(llist, position):
    curr = llist
    if not position:
        curr = curr.next
        llist = llist.next
        return llist
    while position>1:
        curr = curr.next
        position -= 1
    curr.next = curr.next.next
    return llist

if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    llist_count = int(input())

    llist = SinglyLinkedList()

    for _ in range(llist_count):
        llist_item = int(input())
        llist.insert_node(llist_item)

    position = int(input())

    llist1 = deleteNode(llist.head, position)

    print_singly_linked_list(llist1, ' ', fptr)
    fptr.write('\n')

    fptr.close()
```

## Sparse Arrays
Problem Link: https://hackerrank.com/challenges/sparse-arrays/problem
```python
#!/bin/python3

import math
import os
import random
import re
import sys

def matchingStrings(stringList, queries):
    ans = []
    for q in queries:
        freq = 0
        for s in stringList:
            if s == q:
                freq += 1
        ans.append(freq)
    return ans
if __name__ == '__main__':
    fptr = open(os.environ['OUTPUT_PATH'], 'w')

    stringList_count = int(input().strip())

    stringList = []

    for _ in range(stringList_count):
        stringList_item = input()
        stringList.append(stringList_item)

    queries_count = int(input().strip())

    queries = []

    for _ in range(queries_count):
        queries_item = input()
        queries.append(queries_item)

    res = matchingStrings(stringList, queries)

    fptr.write('\n'.join(map(str, res)))
    fptr.write('\n')

    fptr.close()
```
