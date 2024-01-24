/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {
    public $count = 0;
    public $path = [];
    public $freq = [];

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function pseudoPalindromicPaths($root) {
        $this->run($root);
        return $this->count;
    }

    function run(TreeNode &$t) {
        $this->path[] = $t->val;
        $this->freq[$t->val] = $this->freq[$t->val]+1??1;
        
        if (is_null($t->left) && is_null($t->right)) {
            if ($this->isCurrentPathPseudoPalindrome()) {
                $this->count++;
            }
        } else {
            if (!is_null($t->left)) {
                $this->run($t->left);
            }
        
            if (!is_null($t->right)) {
                $this->run($t->right);
           }
        }

        array_pop($this->path);
        $this->freq[$t->val] = $this->freq[$t->val]-1??0;
    }

    function isCurrentPathPseudoPalindrome(){
        $count = 0;
        foreach($this->freq as $val){
            if (!($val % 2 == 0)) {
                $count++;
                if ($count > 1) {
                    return false;
                }
            }
        }
        return true;
    }
}
