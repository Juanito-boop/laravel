import { createClient } from '@supabase/supabase-js'

const apikey = process.env.APIKEY;
const idproject = process.env.ID_PROJECT;

const supabaseClient = createClient(`https://${idproject}.supabase.co`, apikey);

const publicUrl = supabaseClient.storage.from('images').getPublicUrl('178631.png');
console.log(publicUrl)
